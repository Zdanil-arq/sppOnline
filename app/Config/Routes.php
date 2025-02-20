<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('coba', 'Home::coba');
$routes->get('/dashboard', 'Dashboard::index');

//register
$routes->group('register', function($routes){
    $routes->get('/', 'RegisterController::index');
    $routes->post('/', 'RegisterController::store');
});

//login
$routes->group('login', function ($routes) {
    $routes->get('/', 'LoginController::index');
    $routes->post('/', 'LoginController::login');
});


//logout
$routes->group('logout', function ($routes) {
    $routes->get('/', 'LogoutController::index');
});

//datasiswa
$routes->get('/datasiswa', 'DataSiswaController::index');
$routes->get('/datasiswa/create', 'DataSiswaController::create');
$routes->post('/datasiswa/store', 'DataSiswaController::store');
$routes->get('/datasiswa/edit/(:num)', 'DataSiswaController::edit/$1');
$routes->post('/datasiswa/update/(:num)', 'DataSiswaController::update/$1');
$routes->get('/datasiswa/delete/(:num)', 'DataSiswaController::delete/$1');

//datauser
$routes->get('/datauser', 'DataUserController::index');
$routes->get('/datauser/create', 'DataUserController::create');
$routes->post('/datauser/store', 'DataUserController::store');
$routes->get('/datauser/edit/(:num)', 'DataUserController::edit/$1');
$routes->post('/datauser/update/(:num)', 'DataUserController::update/$1');
$routes->get('/datauser/delete/(:num)', 'DataUserController::delete/$1');


//transaksi
$routes->get('/transaksi', 'TransaksiController::index');
$routes->post('/transaksi/search', 'TransaksiController::search');
$routes->get('/transaksi/search', 'TransaksiController::search');
$routes->post('/transaksi/bayar', 'TransaksiController::bayar');
$routes->post('/transaksi/batal', 'TransaksiController::batal');




