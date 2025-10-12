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

        // ✅ Check if user is logged in
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Please log in first.');
        }

        $role = $session->get('role');
        $uri  = service('uri')->getPath(); // e.g. "admin/dashboard"

        // ✅ Admin — can access anything under /admin
        if ($role === 'admin' && str_starts_with($uri, 'admin')) {
            return;
        }

        // ✅ Teacher — can access anything under /teacher
        if ($role === 'teacher' && str_starts_with($uri, 'teacher')) {
            return;
        }

        // ✅ Student — can access /student/* and /announcements
        if ($role === 'student' && 
           (str_starts_with($uri, 'student') || str_starts_with($uri, 'announcements'))) {
            return;
        }

        // ❌ Unauthorized access
        return redirect()
            ->to('/announcements')
            ->with('error', 'Access Denied: Insufficient Permissions');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Nothing to do after
    }
}
