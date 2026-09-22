<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('test-db', 'Test::index');

// Login Routes
$routes->post(
    'login',
    'LoginController::login'
);
$routes->post(
    'login-crypto-config',
    'LoginController::cryptoConfig'
);
$routes->post('verify-otp', 'LoginController::verifyOtp');
$routes->get(
    'logout',
    'LoginController::logout'
);
$routes->post(
    'refresh-captcha',
    'LoginController::refreshCaptcha'
);
$routes->get(
    'contact',
    'LoginController::contact'
);
$routes->get(
    'change-password',
    'ChangePassword::index'
);
$routes->post(
    'change-password/update',
    'ChangePassword::update'
);

// Signup Auth Routes
$routes->get('signup', 'Auth::signup');
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


$routes->get('dashboard', 'Dashboard::index');

// Request routes
$routes->get('new-request', 'RequestController::newRequest', ['filter' => 'role:1']);
$routes->get('getVendors', 'RequestController::getVendors', ['filter' => 'role:1']);
$routes->post('getJammerModelsByVendor', 'RequestController::getJammerModelsByVendor', ['filter' => 'role:1']);
$routes->post('submit-request', 'RequestController::submitRequest', ['filter' => 'role:1']);
$routes->get('view-request/(:num)', 'RequestController::viewRequest/$1', ['filter' => 'role:1,2,3,4,5,6,7,9']);
$routes->get('get-request/(:num)', 'RequestController::getRequest/$1', ['filter' => 'role:1,2,3,4,5,6,7,9']);


// View & upload-signed-pdf routes
$routes->get('request-view/(:num)', 'RequestViewController::index/$1', ['filter' => 'role:1,2,3,4,5,6,7,9']);
$routes->get('request-view', 'RequestViewController::index', ['filter' => 'role:1,2,3,4,5,6,7,9']);
$routes->post('forward', 'RequestViewController::forward', ['filter' => 'role:1,2,3,4,5,6,7,9']);
$routes->post('reject', 'RequestViewController::reject', ['filter' => 'role:1,2,3,4,5,6,7,9']);
$routes->get('application-pdf/(:num)', 'RequestViewController::getApplicationPdf/$1', ['filter' => 'role:1,2,3,4,5,6,7,9']);
$routes->get('preview-application-pdf/(:num)', 'RequestViewController::previewApplicationPdf/$1', ['filter' => 'role:1,2,3,4,5,6,7,9']);
$routes->get('permission-preview-application-pdf/(:num)', 'RequestViewController::permission_previewApplicationPdf/$1', ['filter' => 'role:1,2,3,4,5,6,7,9']);
$routes->get('download-application-pdf/(:num)', 'RequestViewController::downloadApplicationPdf/$1', ['filter' => 'role:1,2,3,4,5,6,7,9']);
$routes->post('upload-signed-pdf', 'RequestViewController::uploadSignedPdf', ['filter' => 'role:1,2,3,4,5,6,7,9']);
$routes->post('upload-permission-letter', 'RequestViewController::uploadPermissionLetter', ['filter' => 'role:1,2,3,4,5,6,7,9']);


// Application PDF routes
$routes->get('preview-application-pdf/(:num)', 'RequestViewController::previewApplicationPdf', ['filter' => 'role:1,2,3,4,5,6,7,9']);
$routes->get('download-application-pdf/(:num)', 'RequestViewController::downloadApplicationPdf', ['filter' => 'role:1,2,3,4,5,6,7,9']);
$routes->post('upload-signed-pdf', 'RequestViewController::uploadSignedPdf', ['filter' => 'role:1,2,3,4,5,6,7,9']);
$routes->get('application-pdf/(:num)', 'RequestViewController::getApplicationPdf', ['filter' => 'role:1,2,3,4,5,6,7,9']);



// location Routes
$routes->get(
    'location/get-states',
    'LocationController::getStates',
    ['filter' => 'role:1,2,3,4,5,6,7,9']
);
$routes->post(
    'location/get-cities',
    'LocationController::getCities',
    ['filter' => 'role:1,2,3,4,5,6,7,9']
);

// Document Routes
$routes->get(
    'view-document/(:num)',
    'RequestViewController::viewDocument/$1',
    ['filter' => 'role:1,2,3,4,5,6,7,9']
);

$routes->get(
    'download-document/(:num)',
    'RequestViewController::downloadDocument/$1',
    ['filter' => 'role:1,2,3,4,5,6,7,9']
);


// Organizations Routes
$routes->get('organizations', 'Dashboard::organizations', ['filter' => 'role:4,9']);
$routes->get('get-organizations', 'Dashboard::getOrganizations', ['filter' => 'role:4,9']);
$routes->post('save-organization', 'Dashboard::saveOrganization', ['filter' => 'role:4,9']);
$routes->get('get-organization/(:num)', 'Dashboard::getOrganization/$1', ['filter' => 'role:4,9']);
$routes->post('delete-organization/(:num)', 'Dashboard::deleteOrganization/$1', ['filter' => 'role:4,9']);

// Organization Types Routes
$routes->get('organization-types', 'Dashboard::orgTypes', ['filter' => 'role:4,9']);
$routes->get('get-org-types', 'Dashboard::getOrgTypes', ['filter' => 'role:4,9']);
$routes->post('save-org-type', 'Dashboard::saveOrgType', ['filter' => 'role:4,9']);
$routes->get('get-org-type/(:num)', 'Dashboard::getOrgType/$1', ['filter' => 'role:4,9']);
$routes->post('delete-org-type/(:num)', 'Dashboard::deleteOrgType/$1', ['filter' => 'role:4,9']);

// Vendor Routes
$routes->get('vendors', 'Dashboard::vendors', ['filter' => 'role:4,9']);
$routes->get('get-vendors', 'Dashboard::getVendors', ['filter' => 'role:4,9']);
$routes->get('get-vendor/(:num)', 'Dashboard::getVendor/$1', ['filter' => 'role:4,9']);
$routes->post('save-vendor', 'Dashboard::saveVendor', ['filter' => 'role:4,9']);
$routes->post('delete-vendor/(:num)', 'Dashboard::deleteVendor/$1', ['filter' => 'role:4,9']);

// Model Routes
$routes->get('models', 'Dashboard::models', ['filter' => 'role:4,9']);
$routes->get('get-models', 'Dashboard::getModels', ['filter' => 'role:4,9']);
$routes->get('get-model/(:num)', 'Dashboard::getModel/$1', ['filter' => 'role:4,9']);
$routes->post('save-model', 'Dashboard::saveModel', ['filter' => 'role:4,9']);
$routes->post('delete-model/(:num)', 'Dashboard::deleteModel/$1', ['filter' => 'role:4,9']);

// User Routes
$routes->get('users', 'Dashboard::users', ['filter' => 'role:4,9']);
$routes->get('get-users', 'Dashboard::getUsers', ['filter' => 'role:4,9']);
$routes->post('save-user', 'Dashboard::saveUser', ['filter' => 'role:4,9']);
$routes->get('get-user/(:num)', 'Dashboard::getUser/$1', ['filter' => 'role:4,9']);
$routes->post('delete-user/(:num)', 'Dashboard::deleteUser/$1', ['filter' => 'role:4,9']);
$routes->post('reset-user-password/(:num)', 'Dashboard::resetUserPassword/$1', ['filter' => 'role:4,9']);
$routes->post('toggle-lock-user/(:num)', 'Dashboard::toggleLockUser/$1', ['filter' => 'role:4,9']);

// Registration Routes
$routes->get('registrations', 'Dashboard::registrations', ['filter' => 'role:4,7,9']);
$routes->post('approve-registration', 'Dashboard::approveRegistration', ['filter' => 'role:4,7,9']);

// Setting Routes
$routes->get('settings', 'SettingController::index', ['filter' => 'role:9']);
$routes->get('get-settings', 'SettingController::getSettings', ['filter' => 'role:9']);
$routes->get('get-setting/(:num)', 'SettingController::getSetting/$1', ['filter' => 'role:9']);
$routes->post('save-setting', 'SettingController::saveSetting', ['filter' => 'role:9']);
$routes->post('delete-setting/(:num)', 'SettingController::deleteSetting/$1', ['filter' => 'role:9']);

// Additional Dashboard Routes
$routes->get('requests', 'Dashboard::requests', ['filter' => 'role:1,2,3,4,5,6,7,9']);
$routes->get('analytics', 'Dashboard::analytics', ['filter' => 'role:1,2,3,4,5,6,7,8,9']);
$routes->get('audit-trail', 'AuditController::auditTrail', ['filter' => 'role:9']);
$routes->get('get-audit-logs', 'AuditController::getAuditLogs', ['filter' => 'role:9']);
$routes->get('audit-log', 'AuditController::auditLog', ['filter' => 'role:9']);
$routes->get('get-audit-actions', 'AuditController::getAuditActions', ['filter' => 'role:9']);

$routes->get('uploads/authorization/(:segment)', 'PdfController::viewPdf/$1', ['filter' => 'role:1,2,3,4,5,6,7,9']);

$routes->get('center-lists', 'CenterListController::index', ['filter' => 'role:1,2,3,4,5,6,7,9']);
$routes->get('center-lists/download-format', 'CenterListController::downloadFormat', ['filter' => 'role:1,2,3,4,5,6,7,9']);
$routes->post('center-lists/upload', 'CenterListController::upload', ['filter' => 'role:1,2,3,4,5,6,7,9']);