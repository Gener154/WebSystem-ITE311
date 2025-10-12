<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model
{
    protected $table = 'announcements';
    protected $primaryKey = 'id';

    protected $allowedFields = ['title', 'content', 'date_posted', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField = 'date_posted';
    protected $updatedField = 'updated_at';
}
