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
$routes->get('createSala', 'Salas::createSalas');


$routes->get('logout', 'Auth::logout');
$routes->get('create', 'Auth::create');
$routes->get('register', 'Auth::register');
$routes->post('createUser', 'Auth::createUser');


//eventos

  $routes->get('calendar', 'Calendario::acharSala');
$routes->get('calendar', 'Reservas::buscarSala');
$routes->post('criarEvento', 'Reservas::criarEvento');


$routes->get('reservas/editarEvento/(:num)', 'Reservas::editarEvento/$1');
$routes->post('reservas/atualizarEvento/(:num)', 'Reservas::atualizarEvento/$1');
$routes->delete('reservas/deletarEvento/(:num)', 'Reservas::deletarEvento/$1');



//acessar calendario
$routes->get('calendar', 'Calendario::index');

$routes->get('dashboard', 'Home::index', ['filter'=>'auth']);
 