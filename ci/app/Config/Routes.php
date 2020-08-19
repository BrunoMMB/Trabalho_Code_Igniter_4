<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 			'Principal::index');
$routes->get('/Pages', 		'Pages::index');
$routes->get('/Principal', 	'Principal::index');
$routes->get('/login', 		'Principal::page_login');
$routes->get('/create', 	'Principal::insert');
$routes->get('/page_login', 'Principal::page_login');
$routes->get('/login', 		'Principal::page_login');
$routes->get('/insert', 	'Principal::insert');
$routes->get('/select', 	'Principal::select');
$routes->get('/delete', 	'Principal::delete');
$routes->get('/update', 	'Principal::update');
$routes->get('/prov', 		'Principal::prov');
$routes->get('/dompdf', 	'Principal::dompdf');

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
