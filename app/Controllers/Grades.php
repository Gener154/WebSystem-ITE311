<?php
namespace App\Controllers;

class Grades extends BaseController
{
    public function index()
    {
        // For now, you can use a static array
        $data['grades'] = [
            ['subject' => 'Math', 'score' => '90'],
            ['subject' => 'English', 'score' => '85'],
        ];
        return view('grades/index', $data);
    }
}
