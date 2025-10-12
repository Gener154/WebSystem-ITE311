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
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #f1b559 0%, #f6d365 100%);
      margin: 0;
      color: #000000ff;
    }

    /* === HEADER === */
    .top-header {
      background-color: #000000ff;
      color: white;
      padding: 1rem 0;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .site-title {
      font-size: 1.7rem;
      font-weight: 600;
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
      font-weight: 500;
      position: relative;
      transition: color 0.2s ease;
    }

    .nav-links a:hover {
      color: #fbbf24;
    }

    /* === MAIN CONTENT === */
    .main-content {
      padding: 2rem;
      min-height: 80vh;
    }

    .page-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
    }

    .page-header h2 {
      font-size: 1.8rem;
      font-weight: 600;
      color: #ffffffff;
    }

    /* === TABLE === */
    .course-table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    }

    .course-table th {
      background-color: #000000ff;
      color: white;
      text-align: left;
      padding: 0.9rem 1rem;
      font-size: 0.95rem;
      letter-spacing: 0.3px;
    }

    .course-table td {
      padding: 0.8rem 1rem;
      border-top: 1px solid #e2e8f0;
      font-size: 0.93rem;
      vertical-align: middle;
    }

    .course-table tr:nth-child(even) {
      background-color: #f9fafb;
    }

    .course-table tr:hover {
      background-color: #f1f5f9;
      transition: background 0.2s ease;
    }

    /* === FOOTER === */
    footer {
      background-color: #0c4a6e;
      color: white;
      text-align: center;
      padding: 1rem;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header class="top-header">
    <div class="container d-flex justify-content-between align-items-center">
      <h1 class="site-title">MyPortal</h1>
      <nav>
        <ul class="nav-links">
          <li><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
          <li><a href="<?= base_url('courses') ?>">Courses</a></li>
          <li><a href="<?= base_url('about') ?>">About</a></li>
          <li><a href="<?= base_url('contact') ?>">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="main-content container">
    <div class="page-header">
      <h2>Course List</h2>
    </div>

    <div class="table-responsive">
      <table class="course-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Course Title</th>
            <th>Instructor</th>
            <th>Schedule</th>
            <th>Units</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; foreach($courses as $course): ?>
          <tr>
            <td><?= $i++ ?></td>
            <td><?= esc($course['title']) ?></td>
            <td><?= esc($course['instructor']) ?></td>
            <td><?= esc($course['schedule'] ?? '—') ?></td>
            <td><?= esc($course['units'] ?? '3') ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>

  

</body>
</html>
