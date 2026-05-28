<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
<<<<<<< HEAD
$routes->get('/', 'Home::index');
=======
$routes->get('/', 'DashboardController::index');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/responden', 'RespondenController::index');
$routes->get('/eksperimen', 'EksperimenController::index');
$routes->get('/panduan', 'PanduanController::index');
$routes->get('/aras', 'ArasController::index');
>>>>>>> 30f665c (feat: implementasi UI/UX lengkap untuk semua halaman tab dan eksperimen mandiri)
