<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Auth::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');

// 🔹 Auth
$routes->get('/register', 'Auth::new');
$routes->post('/register', 'Auth::create');
$routes->get('/login', 'Auth::index');
$routes->post('/login/auth', 'Auth::auth');
$routes->get('/logout', 'Auth::logout');
$routes->get('/dashboard', 'Auth::dashboard', ['filter' => 'auth']);

// 🔹 Announcements
$routes->group('announcements', ['filter' => 'roleauth'], function($routes) {
    $routes->get('/', 'Announcement::index');
    $routes->get('create', 'Announcement::create');
    $routes->post('store', 'Announcement::store');
    $routes->get('delete/(:num)', 'Announcement::delete/$1');
});

// 🔹 Admin
$routes->group('admin', ['filter' => 'roleauth'], function($routes) {
    $routes->get('/', 'Admin::dashboard');
    $routes->get('users', 'Admin::users');
    $routes->get('edit/(:num)', 'Admin::edit/$1');
    $routes->post('update/(:num)', 'Admin::update/$1');
    $routes->get('delete/(:num)', 'Admin::delete/$1');
});

// 🔹 Teacher
$routes->group('teacher', ['filter' => 'roleauth'], function($routes) {
    $routes->get('dashboard', 'Teacher::dashboard');
});

// 🔹 Student
$routes->group('student', ['filter' => 'roleauth'], function($routes) {
    $routes->get('dashboard', 'Student::dashboard');
});

// Disable autoroute for safety
$routes->setAutoRoute(false);
