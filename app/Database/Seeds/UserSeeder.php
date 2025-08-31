<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'email'    => 'admin@example.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role'     => 'admin',
            ],
            [
                'username' => 'instructor1',
                'email'    => 'instructor@example.com',
                'password' => password_hash('instructor123', PASSWORD_DEFAULT),
                'role'     => 'instructor',
            ],
            [
                'username' => 'student1',
                'email'    => 'student@example.com',
                'password' => password_hash('student123', PASSWORD_DEFAULT),
                'role'     => 'student',
            ],
        ];

        // Insert all users at once
        $this->db->table('users')->insertBatch($data);
    }
}
