<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Admin extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    // ✅ Show all users (admin only)
    public function users()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        return view('admin/users', $data);
    }

    // ✅ Edit a specific user — except yourself
    public function edit($id)
    {
        $session = session();
        $userModel = new UserModel();

        // Prevent admin from editing themselves
        if ($session->get('user_id') == $id) {
            return redirect()->to('/admin/users')
                             ->with('error', 'You cannot edit your own account.');
        }

        $data['user'] = $userModel->find($id);
        if (!$data['user']) {
            return redirect()->to('/admin/users')->with('error', 'User not found.');
        }

        return view('admin/edit_user', $data);
    }

    // ✅ Update user (with same self-check)
    public function update($id)
    {
        $session = session();
        $userModel = new UserModel();

        if ($session->get('user_id') == $id) {
            return redirect()->to('/admin/users')
                             ->with('error', 'You cannot update your own account.');
        }

        $data = [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'role'  => $this->request->getPost('role'),
        ];

        $userModel->update($id, $data);

        return redirect()->to('/admin/users')->with('success', 'User updated successfully!');
    }
}
