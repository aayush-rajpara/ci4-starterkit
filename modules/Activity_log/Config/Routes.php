<?php 
namespace Config;
$routes = Services::routes();

$activity_log_module_namespace = ['namespace' => 'Activity_log\Controllers'];

// Activity_log Module Routes
$routes->group('activity_log',$activity_log_module_namespace, function($routes) {
  $routes->match(['get', 'post'], '/', 'Activity_log::index');
  $routes->post('insert', 'Activity_log::insert');
  $routes->post('update', 'Activity_log::update');
  $routes->get('/delete', 'Activity_log::delete');
});
