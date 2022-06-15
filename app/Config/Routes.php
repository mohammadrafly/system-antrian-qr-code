<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//Home
$routes->get('/', 'Home::index');
//QRLog
$routes->get('login', 'Home::login');
$routes->post('loginQR', 'Auth::loginQR');
//UsernameLog
$routes->post('masuk', 'Auth::login');
$routes->get('masuk', 'Home::loginWUsername');
//Register
$routes->post('register', 'Auth::register');
$routes->get('register', 'Home::register');
//Logout
$routes->get('logout', 'Auth::logout');
/*
------------------------------------------------------------------------
*/
$routes->group('dashboard', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Dashboard::indexBackEnd');

    $routes->group('profile', function ($routes) {
        $routes->get('(:any)', 'Profile::index/$1');
        $routes->post('update', 'Profile::update');
        $routes->post('update/password', 'Profile::updatePassword');
        $routes->post('cetak/qrcode', 'Profile::cetakQRCode');
    });
    //Antrian
    $routes->group('antrian', function ($routes) {
        $routes->get('(:any)', 'Antrians::index/$1');
        $routes->get('edit/(:num)', 'Antrians::edit/$1');
        $routes->post('update', 'Antrians::update');
        $routes->post('akhiri', 'Antrians::truncateAntrian');
    });
    //Poli
    $routes->group('poli', function ($routes) {
        $routes->get('/', 'Poliklinik::index');
        $routes->get('add', 'Poliklinik::add');
        $routes->post('store', 'Poliklinik::store');
        $routes->get('edit/(:num)', 'Poliklinik::edit/$1');
        $routes->post('update', 'Poliklinik::update');
        $routes->get('delete/(:num)', 'Poliklinik::delete/$1');
    });
    //user
    $routes->group('user', function ($routes) {
        $routes->get('/', 'Users::index');
        $routes->get('add', 'Users::add');
        $routes->post('store', 'Users::store');
        $routes->get('edit/(:num)', 'Users::edit/$1');
        $routes->post('update', 'Users::update');
        $routes->get('delete/(:num)', 'Users::delete/$1');
    });
});
$routes->group('pasien', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
});
$routes->group('antrian', ['filter' => 'auth'], function ($routes) {
    $routes->post('pilih/(:num)', 'Antrians::addPasien/$1');
    $routes->get('cetak/nomor/antrian/(:num)', 'Antrians::cetakAntrian/$1');
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
