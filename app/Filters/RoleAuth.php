<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $role = $session->get('role');

        // ✅ Correct way to access the URI segments:
        $uri = $request->getUri();
        $segment1 = $uri->getSegment(1); // e.g. "admin" or "teacher"

        // 🔹 Admin: only /admin/*
        if ($role === 'admin' && $segment1 !== 'admin') {
            return redirect()->to('/announcements')->with('error', 'Access Denied: Insufficient Permissions');
        }

        // 🔹 Teacher: only /teacher/*
        if ($role === 'teacher' && $segment1 !== 'teacher') {
            return redirect()->to('/announcements')->with('error', 'Access Denied: Insufficient Permissions');
        }

        // 🔹 Student: only /student/* or /announcements
        if ($role === 'student' && !in_array($segment1, ['student', 'announcements'])) {
            return redirect()->to('/announcements')->with('error', 'Access Denied: Insufficient Permissions');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // You can leave this empty for now
    }
}
