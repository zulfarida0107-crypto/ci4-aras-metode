<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'DashboardController::index');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/responden', 'RespondenController::index');
$routes->get('/eksperimen', 'EksperimenController::index');
$routes->get('/panduan', 'PanduanController::index');
$routes->get('/aras', 'ArasController::index');
