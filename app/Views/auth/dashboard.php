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
         background-color: #f1b559ff;
      }

      .top-header {
         background-color: #14191fff;
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
         color: #fbbf24;
      }

      .logout-btn {
         margin-left: 1.5rem;
      }

      .page-title {
         font-size: 2rem;
         font-weight: 400;
         margin-bottom: 1rem;
         color: #000000ff;
      }

      .content-text {
         color: #555555ff;
         line-height: 1.6;
      }

      /* Announcements Section */
      .announcement-section {
         margin-top: 50px;
      }

      .announcement-card {
         background-color: white;
         border-radius: 8px;
         padding: 15px 20px;
         box-shadow: 0 2px 6px rgba(0,0,0,0.1);
         margin-bottom: 15px;
      }

      .announcement-card h5 {
         margin: 0;
         color: #14191fff;
      }

      .announcement-card small {
         color: #888;
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
                        <li><a href="<?= base_url('admin') ?>">Manage Users</a></li>
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

   <div class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 70vh;">
      <div class="card shadow p-4 text-center mb-4" style="max-width: 500px;">
         <h2 class="page-title">Welcome, <?= esc(session()->get('name')) ?>!</h2>

         <?php 
            $userRole = session()->get('role'); 
            $displayRole = !empty($userRole) ? $userRole : 'No role assigned';
         ?>

         <p class="content-text">
             You are logged in as <b><?= session()->get('role') ?></b>.
         </p>
      </div>

      <!-- 📰 Announcements Section -->
      <div class="announcement-section container">
         <h3 class="mb-3 text-center">📢 Latest Announcements</h3>
         <?php if (!empty($announcements)): ?>
            <?php foreach ($announcements as $a): ?>
               <div class="announcement-card">
                  <h5><?= esc($a['title']) ?></h5>
                  <p><?= esc($a['content']) ?></p>
                  <small>Posted on <?= date('F j, Y', strtotime($a['created_at'])) ?></small>
               </div>
            <?php endforeach; ?>
         <?php else: ?>
            <p class="text-center text-muted">No announcements available.</p>
         <?php endif; ?>
      </div>
   </div>

   <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
