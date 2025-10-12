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
            background-color: #f1b559;
        }

        .top-header {
            background-color: #030405;
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
            list-style: none;
            padding: 0;
            margin: 0;
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
            font-size: 2rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            color: #2c3e50;
        }
    </style>
</head>
<body>

<!-- Top Header -->
<header class="top-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="site-title">MyPortal</h1>
            <nav>
                <ul class="nav-links">
                    <li><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                    <li><a href="<?= base_url('about') ?>">About</a></li>
                    <li><a href="<?= base_url('contact') ?>">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container main-content">
    <div class="card shadow p-4">
        <h1 class="page-title text-center mb-4">Manage Users</h1>

        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr>
                    <td><?= esc($user['id']) ?></td>
                    <td><?= esc($user['name']) ?></td>
                    <td><?= esc($user['email']) ?></td>
                    <td><?= esc($user['role']) ?></td>

                    <td class="text-center">
                        <?php if(session()->get('user_id') != $user['id']): ?>
                            <a href="<?= base_url('admin/edit/'.$user['id']) ?>" class="btn btn-sm btn-primary me-1">Edit</a>
                            <a href="<?= base_url('admin/delete/'.$user['id']) ?>" class="btn btn-sm btn-danger"
                               onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                        <?php else: ?>
                            <span class="badge bg-secondary">Your Account</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
