<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/index', 'Pages::index');

$routes->get('/formtambahmember', 'DashboardKaryawan::create');
$routes->post('/formtambahmember/store', 'DashboardKaryawan::store');
$routes->get('/formeditmember/edit/(:num)', 'DashboardKaryawan::edit/$1');
$routes->post('/formeditmember/update/(:num)', 'DashboardKaryawan::update/$1');
$routes->delete('/dashboardkaryawan/delete/(:num)', 'DashboardKaryawan::delete/$1');

$routes->post('/formloginkaryawan/process', 'LoginKaryawan::process');
$routes->get('/karyawan/logout', 'LoginKaryawan::logout');
$routes->get('/dashboardkaryawan', 'DashboardKaryawan::index');
$routes->post('/dashboardkaryawan', 'DashboardKaryawan::index');

$routes->get('/listkaryawan', 'ListKaryawan::index');
$routes->post('/listkaryawan', 'ListKaryawan::index');
$routes->get('/formeditkaryawan/(:num)', 'AkunKaryawan::edit/$1');
$routes->post('/formeditkaryawan/update/(:num)', 'AkunKaryawan::update/$1');
$routes->get('/regis', 'AkunKaryawan::create');
$routes->post('/regis/store', 'AkunKaryawan::store');
$routes->delete('/listkaryawan/delete/(:num)', 'AkunKaryawan::delete/$1');


$routes->post('/formloginadmin/process', 'LoginAdmin::process');
$routes->get('/admin/logout', 'LoginAdmin::logout');
$routes->get('/dashboardadmin', 'DashboardAdmin::index');
$routes->get('/member/cetak_kartu/(:num)','AkunKaryawan::cetakkartu/$1');


$routes->get('(:any)', 'Pages::view/$1');
// $routes->post('/formtambahmember', 'TambahMember::create');
// $routes->post('/formtambahmember/store', 'TambahMember::store');
$routes->get('/karyawan/logout', 'LoginKaryawan::logout');
$routes->get('/admin/logout', 'LoginAdmin::logout');
$routes->get('/formloginkaryawan', 'LoginKaryawan::index');
$routes->get('/formloginadmin', 'LoginAdmin::index');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
