<?php 
namespace Config;
$routes = Services::routes();

$permissions_module_namespace = ['namespace' => 'Permissions\Controllers'];

// Permissions Module Routes
$routes->group('permissions',$permissions_module_namespace, function($routes) {
  $routes->match(['get', 'post'],'/', 'Permissions::index');
  $routes->post('save', 'Permissions::save');
  $routes->post('getPermission/(:num)', 'Permissions::getPermission/$1');
  $routes->delete('delete/(:num)', 'Permissions::delete/$1');
});
