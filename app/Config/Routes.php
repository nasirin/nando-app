<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->group('auth', ['filter' => 'noauth'], function ($routes) {
	$routes->get('/', 'Auth');
	$routes->post('login', 'Auth::login');
});
$routes->get('/auth/logout', 'Auth::logout');

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Admin');
	$routes->get('tambah', 'Admin::create');
	$routes->post('tambah', 'Admin::store');
	$routes->get('edit/(:num)', 'Admin::edit/$1');
	$routes->post('edit/(:num)', 'Admin::update/$1');
	$routes->get('delete/(:num)', 'Admin::destroy/$1');
});

$routes->group('pelanggan', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Pelanggan');
	$routes->get('tambah', 'Pelanggan::create');
	$routes->post('tambah', 'Pelanggan::store');
	$routes->get('edit/(:num)', 'Pelanggan::edit/$1');
	$routes->post('edit/(:num)', 'Pelanggan::update/$1');
	$routes->get('delete/(:num)', 'Pelanggan::destroy/$1');
});

$routes->group('kamar', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Kamar');
	$routes->get('detail/(:num)', 'Kamar::show/$1');
	$routes->get('tambah', 'Kamar::create');
	$routes->post('tambah', 'Kamar::store');
	$routes->get('edit/(:num)', 'Kamar::edit/$1');
	$routes->post('edit/(:num)', 'Kamar::update/$1');
	$routes->get('delete/(:num)', 'Kamar::destroy/$1');
});

$routes->group('booking', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Booking');
	$routes->get('tambah', 'Booking::create');
	$routes->post('tambah', 'Booking::store');
	$routes->get('edit/(:num)', 'Booking::edit/$1');
	$routes->post('edit/(:num)', 'Booking::update/$1');
	$routes->post('delete/(:num)', 'Booking::destroy/$1');
	$routes->get('checkout/(:num)', 'Booking::checkout/$1');
});

$routes->group('invoice', ['filter' => 'auth'], function ($routes) {
	$routes->get('(:num)', 'Invoice::index/$1');
	$routes->post('(:num)', 'Invoice::payment/$1');
});



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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
