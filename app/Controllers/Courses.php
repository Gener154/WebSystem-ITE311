<?php
namespace App\Controllers;

class Courses extends BaseController
{
    public function index()
    {
        // Example static courses for demonstration
        $data['courses'] = [
            ['title' => 'Math 101', 'instructor' => 'Mr. Smith'],
            ['title' => 'English 101', 'instructor' => 'Ms. Johnson'],
        ];

        return view('courses/index', $data);
    }
}
