<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Auth::login');
$routes->post('/auth/proses_login', 'Auth::proses_login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/login-siswa', 'Auth::login_siswa');
$routes->post('/auth/proses_login_siswa', 'Auth::proses_login_siswa');

// Proteksi halaman admin dengan filter 'auth'
$routes->group('admin', ['filter' => 'auth'], function($routes) {
$routes->get('dashboard', 'Admin::index');
});

// halaman login siswa
$routes->group('siswa', ['filter' => 'auth'], function($routes) {
$routes->get('dashboard', 'Siswa::index');
});