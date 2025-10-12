<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Default route (login page)
$routes->get('/', 'Auth::index');

// 🔹 Auth Routes
$routes->get('/register', 'Auth::new');
$routes->post('/register', 'Auth::create');
$routes->get('/login', 'Auth::index');
$routes->post('/login/auth', 'Auth::auth');
$routes->get('/logout', 'Auth::logout');
$routes->get('/dashboard', 'Auth::dashboard', ['filter' => 'auth']);

// 🔹 Announcements (accessible by all logged-in users)
$routes->get('/announcements', 'Announcement::index', ['filter' => 'roleauth']);

// 🔹 Teacher Routes (roleauth filter applied)
$routes->group('teacher', ['filter' => 'roleauth'], function ($routes) {
    $routes->get('dashboard', 'Teacher::dashboard');
});

// 🔹 Admin Routes (roleauth filter applied)
$routes->group('admin', ['filter' => 'roleauth'], function ($routes) {
    $routes->get('/', 'Admin::dashboard');
    $routes->get('dashboard', 'Admin::dashboard');
});

// 🔹 Student Routes (optional but recommended)
$routes->group('student', ['filter' => 'roleauth'], function ($routes) {
    $routes->get('dashboard', 'Student::dashboard');
});

// Disable auto-routing for safety
$routes->setAutoRoute(false);
