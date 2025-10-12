<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Welcome Back Students',
                'content' => 'Welcome to the new semester! Please check your course schedules and announcements regularly.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Library Maintenance This Weekend',
                'content' => 'The university library will be closed Saturday for system maintenance. Online resources remain available.',
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 day')),
            ],
        ];

        $this->db->table('announcements')->insertBatch($data);
    }
}
