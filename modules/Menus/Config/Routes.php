<?php 

namespace Config;

$routes = Services::routes();

$menus_module_namespace = ['namespace' => 'Menus\Controllers'];

// Menus Module Routes
$routes->group('menus', $menus_module_namespace, function ($routes) {
    $routes->match(['get', 'post'], '/', 'Menus::index', ['as' => 'routeToMenu']);
});
