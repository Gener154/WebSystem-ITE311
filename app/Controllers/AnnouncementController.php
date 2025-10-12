<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;
use CodeIgniter\Controller;

class AnnouncementController extends Controller
{
    public function index()
    {
        $model = new AnnouncementModel();
        $data['announcements'] = $model->orderBy('created_at', 'DESC')->findAll();

        return view('announcements/index', $data);
    }

    public function create()
    {
        return view('announcements/create');
    }

    public function store()
    {
        $model = new AnnouncementModel();

        $model->save([
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ]);

        return redirect()->to('/announcements')->with('success', 'Announcement added successfully.');
    }

    public function delete($id)
    {
        $model = new AnnouncementModel();
        $model->delete($id);

        return redirect()->to('/announcements')->with('success', 'Announcement deleted.');
    }
}
