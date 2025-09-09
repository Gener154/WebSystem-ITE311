<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'MyPortal' ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f1b559ff;
        }
        
        .top-header {
            background-color: #030405ff;
            color: white;
            padding: 1rem 0;
        }
        
        .site-title {
            font-size: 1.5rem;
            font-weight: 500;
            margin: 0;
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
            margin: 0;
            list-style: none;
            padding: 0;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
        }
        
        .nav-links a:hover {
            color: #bdc3c7;
        }
        
        .main-content {
            padding: 3rem 0;
            min-height: 70vh;
        }
        
        .page-title {
            font-size: 2.5rem;
            font-weight: 300;
            margin-bottom: 1.5rem;
            color: #2c3e50;
        }
        
        .content-text {
            color: #666;
            line-height: 1.6;
        }
    </style>
</head>
<body>

<nav>
    <ul class="nav-links">
        <?php if(session()->get('role') === 'admin'): ?>
            <li><a href="<?= base_url('users') ?>">Manage Users</a></li>
            <li><a href="<?= base_url('settings') ?>">Settings</a></li>
        <?php elseif(session()->get('role') === 'student'): ?>
            <li><a href="<?= base_url('courses') ?>">My Courses</a></li>
            <li><a href="<?= base_url('grades') ?>">Grades</a></li>
        <?php elseif(session()->get('role') === 'instructor'): ?>
            <li><a href="<?= base_url('courses') ?>">My Courses</a></li>
        <?php endif; ?>
    </ul>
</nav>
