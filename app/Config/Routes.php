<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::index');
$routes->post('authenticate', 'Auth::authenticate');

//atualizar usuario acessar
$routes->get('update', 'Auth::acessar');
//publica
$routes->post('updateUser', 'Auth::updateUser');
$routes->get('logout', 'Auth::logout');
$routes->get('create', 'Auth::create');
$routes->get('register', 'Auth::register');
$routes->post('createUser', 'Auth::createUser');
//eventos

  $routes->get('calendar', 'Calendario::acharSala');
$routes->get('calendar', 'Reservas::buscarSala');
$routes->post('criarEvento', 'Reservas::criarEvento');

//acessar calendario
$routes->get('calendar', 'Calendario::index');

$routes->get('dashboard', 'Home::index', ['filter'=>'auth']);
 