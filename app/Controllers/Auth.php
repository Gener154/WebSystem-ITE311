<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AnnouncementModel;

class Auth extends BaseController
{
    public function new()
    {
        if (session()->get('isLoggedIn')) 
            return redirect()->to('/dashboard')->with('error', 'You cannot open register while logged in.');

        helper(['form']);
        return view('auth/register');
    }

    public function create()
    {
        helper(['form']);
        $users = new UserModel();

        // Get role from form OR set a default one
        $role = $this->request->getPost('role');
        if (empty($role)) {
            $role = 'student'; // default role if none chosen
        }

        $data = [
            'name'         => $this->request->getPost('name'),
            'email'        => $this->request->getPost('email'),
            'password'     => $this->request->getPost('password'),
            'pass_confirm' => $this->request->getPost('pass_confirm'),
            'role'         => $role,
        ];

        if (! $users->save($data)) {
            return redirect()->back()
                             ->withInput()
                             ->with('errors', $users->errors());
        }

        return redirect()->to('/register/success')
                         ->with('success', 'Account created!');
    }

    public function success()
    {
        return view('register_success');
    }

    public function index()
    {
        if (session()->get('isLoggedIn')) 
            return redirect()->to('/dashboard')->with('error', 'You are already logged in.');

        helper(['form', 'url']);
        return view('auth/login');
    }

    // ✅ UPDATED METHOD: Role-Based Redirection
    public function auth()
    {
        $session = session();
        $users   = new UserModel();

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $users->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $sessionData = [
                    'id'         => $user['id'],
                    'name'       => $user['name'],
                    'email'      => $user['email'],
                    'role'       => $user['role'],
                    'isLoggedIn' => true,
                ];
                $session->set($sessionData);

                // ✅ Role-based redirection logic
                switch ($user['role']) {
                    case 'student':
                        return redirect()->to('/announcements');
                    case 'teacher':
                        return redirect()->to('/teacher/dashboard');
                    case 'admin':
                        return redirect()->to('/admin/dashboard');
                    default:
                        return redirect()->to('/login')->with('error', 'Invalid role assigned.');
                }

            } else {
                return redirect()->back()->with('error', 'Wrong password.');
            }
        } else {
            return redirect()->back()->with('error', 'Email not found.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function dashboard()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must log in first.');
        }

        // ✅ Load announcements from the database
        $announcementModel = new AnnouncementModel();
        $announcements = $announcementModel->orderBy('date_posted', 'DESC')->findAll();

        $data = [
            'title' => 'Dashboard',
            'announcements' => $announcements
        ];

        return view('auth/dashboard', $data);
    }

    // ✅ Admin management features
    public function manageUsers()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Access denied.');
        }

        $userModel = new UserModel();
        $currentUserId = session()->get('id');

        $users = $userModel->where('id !=', $currentUserId)->findAll();

        return view('admin/manage_users', [
            'title' => 'Manage Users',
            'users' => $users
        ]);
    }

    public function editUser($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Access denied.');
        }

        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to('admin/users')->with('error', 'User not found.');
        }

        return view('admin/edit_user', ['user' => $user]);
    }

    public function updateUser($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Access denied.');
        }

        $userModel = new UserModel();
        $data = [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'role'  => $this->request->getPost('role'),
        ];

        $userModel->update($id, $data);

        return redirect()->to('admin/users')->with('success', 'User updated successfully.');
    }

    public function deleteUser($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Access denied.');
        }

        $userModel = new UserModel();

        // Prevent deleting self
        if ($id == session()->get('id')) {
            return redirect()->to('admin/users')->with('error', 'You cannot delete yourself.');
        }

        $userModel->delete($id);

        return redirect()->to('admin/users')->with('success', 'User deleted successfully.');
    }
}
