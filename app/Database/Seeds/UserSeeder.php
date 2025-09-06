<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

// Seeder for inserting default users

class UserSeeder extends Seeder
{
    public function run()
    {
        $students = [
            [
                'email'    => 'admin@example.com',
        'password' => password_hash('admin123', PASSWORD_DEFAULT),
        'role'     => 'admin'
    ],
    [
        'email'    => 'instructor@example.com',
        'password' => password_hash('instructor123', PASSWORD_DEFAULT),
        'role'     => 'instructor'
    ],
    [
        'email'    => 'student@example.com',
        'password' => password_hash('student123', PASSWORD_DEFAULT),
        'role'     => 'student'
            ]
        ];
        $this->db->table('users')->insertBatch($students);
    }
}
