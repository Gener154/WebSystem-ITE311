<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;

    // Only allow these columns to be mass-assigned
    protected $allowedFields = ['name', 'email', 'password', 'role'];

    // Validate incoming form fields (including non-DB fields)
protected $validationRules = [
    'name'          => 'required|alpha_space|min_length[2]|max_length[50]',
    'email'         => 'required|valid_email|is_unique[users.email,id,{id}]',
    'password'      => 'required|min_length[6]',
    'pass_confirm'  => 'matches[password]',
    'role'          => 'required|in_list[student,teacher,admin]',
];

protected $validationMessages = [
    'name' => [
        'required' => 'Name is required.',
        'alpha_space' => 'Name can only contain letters and spaces.',
        'min_length' => 'Name must be at least 2 characters.',
        'max_length' => 'Name cannot exceed 50 characters.',
    ],
    'email' => [
        'required' => 'Email is required.',
        'valid_email' => 'Please enter a valid email.',
        'is_unique' => 'This email is already registered.',
    ],
    'password' => [
        'required' => 'Password is required.',
        'min_length' => 'Password must be at least 6 characters.',
    ],
    'pass_confirm' => [
        'matches' => 'Passwords do not match.',
    ],
    'role' => [
        'required' => 'Role is required.',
        'in_list' => 'Invalid role selected.',
    ],
];

    protected $skipValidation = false;

    // Hash password on insert/update if provided
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (!empty($data['data']['password'])) {
        $data['data']['password'] = password_hash(
            $data['data']['password'],
            PASSWORD_DEFAULT
        );
        unset($data['data']['pass_confirm']);
    }
    return $data;
    }
}
