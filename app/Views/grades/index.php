<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($title) ? $title : 'MyPortal | Grades' ?></title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* === GLOBAL === */
    body {
      margin: 0;
      font-family: "Poppins", sans-serif;
      background-color: #f1b559ff;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* === HEADER === */
    .top-header {
      background: rgba(3, 4, 5, 0.9);
      color: #fff;
      padding: 1rem 0;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(6px);
    }

    .site-title {
      font-size: 1.8rem;
      font-weight: 600;
      margin: 0;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    .nav-links {
      display: flex;
      gap: 2rem;
      margin: 0;
      list-style: none;
      padding: 0;
    }

    .nav-links a {
      color: #fff;
      text-decoration: none;
      font-weight: 500;
      position: relative;
      transition: color 0.3s ease;
    }

    .nav-links a::after {
      content: "";
      position: absolute;
      width: 0;
      height: 2px;
      background: #000000ff;
      bottom: -4px;
      left: 0;
      transition: width 0.3s ease;
    }

    .nav-links a:hover {
      color: #f1b559;
    }

    .nav-links a:hover::after {
      width: 100%;
    }

    /* === MAIN CONTENT === */
    .main-content {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
    }

    /* === GLASS CARD === */
    .glass-card {
      background: rgba(0, 0, 0, 0.9);
      color: #fff;
      border-radius: 20px;
      padding: 3rem 2rem;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      max-width: 650px;
      width: 100%;
      animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .page-title {
      font-size: 2.5rem;
      font-weight: 600;
      text-align: center;
      margin-bottom: 1.5rem;
    }

    .content-text h2 {
      text-align: center;
      font-weight: 500;
      color: #070707ff;
      margin-bottom: 1.5rem;
    }

    .grades-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .grades-list li {
      background: rgba(255, 253, 253, 1);
      border-radius: 12px;
      padding: 1rem;
      margin-bottom: 0.75rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: transform 0.2s ease, background 0.3s ease;
    }

    .grades-list li:hover {
      transform: translateY(-3px);
      background: rgba(184, 179, 179, 1);
    }

    .grades-list strong {
      color: #000;
      font-weight: 600;
    }

    /* === SPECIFIC SUBJECT COLORS === */
    .subject-black {
      color: #000;
      font-weight: 600;
    }

    /* === FOOTER === */
    footer {
      text-align: center;
      padding: 1rem 0;
      background: rgba(3, 4, 5, 0.9);
      color: #0f0d0dff;
      font-size: 0.9rem;
      letter-spacing: 0.5px;
    }
  </style>
</head>
<body>

  <!-- HEADER -->
  <header class="top-header">
    <div class="container d-flex justify-content-between align-items-center">
      <h1 class="site-title">MyPortal</h1>
      <nav>
        <ul class="nav-links">
          <li><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
          <li><a href="<?= base_url('grades') ?>">Grades</a></li>
          <li><a href="<?= base_url('about') ?>">About</a></li>
          <li><a href="<?= base_url('contact') ?>">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- MAIN -->
  <main class="main-content">
    <div class="glass-card">
      <h1 class="page-title">My Grades</h1>
      <div class="content-text">
        <?php if (!empty($grades)): ?>
          <ul class="grades-list">
            <?php foreach ($grades as $grade): ?>
              <?php 
                $subject = esc($grade['subject']); 
                $isBlack = in_array(strtolower($subject), ['math', 'english']); 
              ?>
              <li>
                <span class="<?= $isBlack ? 'subject-black' : '' ?>"><?= $subject ?></span>
                <strong><?= esc($grade['score']) ?></strong>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p class="text-center text-light">No grades available yet.</p>
        <?php endif; ?>
      </div>
    </div>
  </main>

</body>
</html>
