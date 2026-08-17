<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('test-db', 'Test::index');

// Auth Routes
$routes->post('auth/checkLogin', 'Auth::checkLogin');
$routes->post('auth/register', 'Auth::register');
$routes->post('refresh-captcha', 'Auth::refreshCaptcha');
$routes->get('logout', 'Auth::logout');

$routes->get('dashboard', 'Dashboard::index');
$routes->get('new-request', 'Dashboard::newRequest');
$routes->post('dashboard/submit-request', 'Dashboard::submitRequest');
$routes->get('dashboard/view-request/(:num)', 'Dashboard::viewRequest/$1');
$routes->get('dashboard/get-request/(:num)', 'Dashboard::getRequest/$1');
