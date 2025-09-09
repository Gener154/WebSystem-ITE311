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
         background-color: #f1b559ff; /* light gray background */
      }
      
      .top-header {
         background-color: #14191fff; /* Bootstrap blue */
         color: white;
         padding: 0.8rem 0;
      }
      
      .site-title {
         font-size: 1.5rem;
         font-weight: 600;
         margin: 0;
      }
      
      .nav-links {
         display: flex;
         gap: 1.5rem;
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
         color: #dfe6ee;
      }
      
      .logout-btn {
         margin-left: 1.5rem;
      }
      
      .page-title {
         font-size: 2rem;
         font-weight: 400;
         margin-bottom: 1rem;
         color: #007bff; /* match header color */
      }
      
      .content-text {
         color: #555;
         line-height: 1.6;
      }
   </style>
</head>
<body>
   <header class="top-header">
   <div class="container">
      <div class="d-flex justify-content-between align-items-center">
         <h1 class="site-title">MyPortal</h1>
         
         <div class="d-flex align-items-center">
            <nav>
               <ul class="nav-links">
                  <li><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                  
                  <?php if(session()->get('role') === 'admin'): ?>
                     <li><a href="<?= base_url('users') ?>">Manage Users</a></li>
                     <li><a href="<?= base_url('settings') ?>">Settings</a></li>
                  <?php elseif(session()->get('role') === 'teacher'): ?>
                     <li><a href="<?= base_url('courses') ?>">My Courses</a></li>
                  <?php elseif(session()->get('role') === 'student'): ?>
                     <li><a href="<?= base_url('courses') ?>">My Courses</a></li>
                     <li><a href="<?= base_url('grades') ?>">My Grades</a></li>
                  <?php endif; ?>
                  
                  <li><a href="<?= base_url('about') ?>">About</a></li>
                  <li><a href="<?= base_url('contact') ?>">Contact</a></li>
               </ul>
            </nav>
            
            <a href="<?= base_url('logout') ?>" class="btn btn-light btn-sm logout-btn">Logout</a>
         </div>
      </div>
   </div>
</header>


  <div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
   <div class="card shadow p-4 text-center">
      <h2 class="page-title">Welcome, <?= session()->get('name') ?>!</h2>
      <p class="content-text">
         You are logged in as <b><?= session()->get('role') ?></b>.
      </p>
   </div>
</div>


   <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
