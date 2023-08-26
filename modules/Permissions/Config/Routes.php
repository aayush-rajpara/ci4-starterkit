<?php 
namespace Config;
$routes = Services::routes();

$permissions_module_namespace = ['namespace' => 'Permissions\Controllers'];

// Permissions Module Routes
$routes->group('permissions',$permissions_module_namespace, function($routes) {
  $routes->get('/', 'Permissions::index');
  $routes->get('/insert', 'Permissions::insert');
  $routes->get('/update', 'Permissions::update');
  $routes->get('/delete', 'Permissions::delete');
});
