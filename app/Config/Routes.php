<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('test-db', 'Test::index');

// Auth Routes
$routes->get('signup', 'Auth::signup');
$routes->post('auth/checkLogin', 'Auth::checkLogin');
$routes->post('auth/register', 'Auth::register');
$routes->get(
    'auth/authorization',
    'Auth::authorization'
);
$routes->post(
    'auth/upload-authorization',
    'Auth::uploadAuthorization'
);
$routes->get(
    'auth/application-submitted',
    'Auth::applicationSubmitted'
);
$routes->post('refresh-captcha', 'Auth::refreshCaptcha');
$routes->get('logout', 'Auth::logout');

$routes->get('dashboard', 'Dashboard::index');
$routes->get('new-request', 'Dashboard::newRequest');
$routes->post('dashboard/submit-request', 'Dashboard::submitRequest');
$routes->get('dashboard/view-request/(:num)', 'Dashboard::viewRequest/$1');
$routes->get('dashboard/get-request/(:num)', 'Dashboard::getRequest/$1');

// Organizations Routes
$routes->get('dashboard/organizations', 'Dashboard::organizations');
$routes->get('dashboard/get-organizations', 'Dashboard::getOrganizations');
$routes->post('dashboard/save-organization', 'Dashboard::saveOrganization');
$routes->get('dashboard/get-organization/(:num)', 'Dashboard::getOrganization/$1');
$routes->post('dashboard/delete-organization/(:num)', 'Dashboard::deleteOrganization/$1');
