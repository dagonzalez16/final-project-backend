<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'RegisterController::index');
$routes->post('register', 'RegisterController::store');
$routes->get('login', 'LoginController::index');
$routes->post('login', 'LoginController::authenticate');
$routes->get('logout', 'LoginController::logout');
$routes->get('admin', 'AdminController::index');
$routes->get('admin/dashboard', 'AdminController::dashboard');
$routes->get('admin/edit/(:num)', 'AdminController::editUser/$1');
$routes->post('admin/update/(:num)', 'AdminController::updateUser/$1');
$routes->get('admin/delete/(:num)', 'AdminController::deleteUser/$1');
$routes->get('user/dashboard', 'UserController::index');
$routes->get('user/createImage', 'UserController::createImage');
$routes->post('user/createImage', 'UserController::createImage');
$routes->get('user/getUserImages', 'UserController::getUserImages');