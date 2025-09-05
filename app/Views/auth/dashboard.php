<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= isset($title) ? $title : 'MyPortal' ?></title>
   <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
   <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f8f9fa;
        }
        
        .top-header {
            background-color: #2c3e50;
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
            color: #508bc5ff;
        }
        
        .content-text {
            color: #666;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <header class="top-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="site-title">MyPortal</h1>
                <nav>
                    <ul class="nav-links">
                        <li><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li><a href="<?= base_url('about') ?>">About</a></li>
                        <li><a href="<?= base_url('contact') ?>">Contact</a></li>
                        <li><a href="<?= base_url('logout') ?>">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="container main-content" style="max-width: 700px;">
        <div class="card shadow p-4">
            <h2 class="page-title">Welcome, <?= session()->get('name') ?>!</h2>
            <p class="content-text">
                You are logged in as <b><?= session()->get('role') ?></b>.
            </p>
            <a href="<?= base_url('logout') ?>" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
