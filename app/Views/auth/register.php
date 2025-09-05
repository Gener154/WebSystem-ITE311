<!doctype html>
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
                        <li><a href="<?= base_url('register') ?>">Register</a></li>
                        <li><a href="<?= base_url('login') ?>">Login</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="container main-content" style="max-width: 500px;">

        <h2 class="mb-4 text-center">Register</h2>

        <!-- Success message -->
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <!-- Validation errors -->
        <?php if(isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <!-- Registration form -->
        <?= form_open('/register') ?>
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input name="name" type="text" value="<?= old('name') ?>" required class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" value="<?= old('email') ?>" required class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" value="<?= old('password') ?>" required class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label for="pass_confirm" class="form-label">Confirm Password</label>
                <input name="pass_confirm" type="password" value="<?= old('pass_confirm') ?>" required class="form-control" id="pass_confirm">
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        <?= form_close() ?>

        <p class="mt-3 text-center">
            Already have an account? <a href="<?= base_url('login') ?>">Login here</a>
        </p>

    </div>

    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
