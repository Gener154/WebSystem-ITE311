<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= esc($title ?? 'MyPortal') ?></title>
   <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">

   <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #e99e49ff);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .top-header {
            background: #1c1c1c;
            color: #fcfbf9ff;
            padding: 1rem 0;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        }
        .site-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
        }
        .nav-links {
            display: flex;
            gap: 1.5rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
        }
        .nav-links a:hover {
            color: #dbdad6ff;
        }
        .register-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }
        .register-card {
            width: 100%;
            max-width: 450px;
            background: #ffffffff;
            border-radius: 1rem;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            transition: transform 0.3s ease;
        }
        .register-card:hover {
            transform: translateY(-5px);
        }
        .register-card h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 600;
            color: #2c3e50;
        }
        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 5px rgba(106,17,203,0.5);
        }
        .btn-register {
            background: linear-gradient( #145eddff);
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-register:hover {
            background: linear-gradient( #2575fc);
        }
        .register-footer {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }
        .register-footer a {
            color: #5335d8ff;
            font-weight: 500;
            text-decoration: none;
        }
        .register-footer a:hover {
            text-decoration: underline;
        }
        .alert {
            font-size: 0.9rem;
        }
   </style>
</head>
<body>

    <!-- Top Header -->
    <header class="top-header">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="site-title">MyPortal</h1>
            <nav>
                <ul class="nav-links">
                    <li><a href="<?= base_url('register') ?>">Register</a></li>
                    <li><a href="<?= base_url('login') ?>">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Registration Form -->
    <div class="register-container">
        <div class="register-card">

            <h2>Create Account</h2>

            <!-- Success message -->
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <!-- Validation errors -->
            <?php if(session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach(session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- ✅ Manual form -->
            <form action="<?= base_url('register') ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input 
                        name="name" 
                        type="text" 
                        value="<?= old('name') ?>" 
                        class="form-control <?= session('errors.name') ? 'is-invalid' : '' ?>" 
                        id="name"
                        required>
                    <?php if(session('errors.name')): ?>
                        <div class="invalid-feedback"><?= session('errors.name') ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        name="email" 
                        type="email" 
                        value="<?= old('email') ?>" 
                        class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" 
                        id="email"
                        required>
                    <?php if(session('errors.email')): ?>
                        <div class="invalid-feedback"><?= session('errors.email') ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        name="password" 
                        type="password" 
                        class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>" 
                        id="password"
                        required>
                    <?php if(session('errors.password')): ?>
                        <div class="invalid-feedback"><?= session('errors.password') ?></div>
                    <?php endif; ?>
                </div>

                    <div class="mb-3">
                    <label for="pass_confirm" class="form-label">Confirm Password</label>
                    <input 
                        name="pass_confirm" 
                        type="password" 
                        class="form-control <?= session('errors.pass_confirm') ? 'is-invalid' : '' ?>" 
                        id="pass_confirm"
                     required
                     placeholder="Re-enter your password">
                 <?php if(session('errors.pass_confirm')): ?>
                  <div class="invalid-feedback">
                    <?= session('errors.pass_confirm') ?>
                    </div>
                 <?php endif; ?>
                 </div>


                <div class="mb-3">
                    <label for="role" class="form-label">Role Selection</label>
                    <select 
                        name="role" 
                        id="role" 
                        class="form-select <?= session('errors.role') ? 'is-invalid' : '' ?>" 
                        required>
                        <option value="">-- Choose Role --</option>
                        <option value="student" <?= old('role') === 'student' ? 'selected' : '' ?>>Student</option>
                        <option value="teacher" <?= old('role') === 'teacher' ? 'selected' : '' ?>>Teacher</option>
                        <option value="admin" <?= old('role') === 'admin' ? 'selected' : '' ?>>Admin</option>
                    </select>
                    <?php if(session('errors.role')): ?>
                        <div class="invalid-feedback"><?= session('errors.role') ?></div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-register w-100">Register</button>
            </form>

            <p class="register-footer">
                Already have an account? <a href="<?= base_url('login') ?>">Login here</a>
            </p>

        </div>
    </div>

    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>