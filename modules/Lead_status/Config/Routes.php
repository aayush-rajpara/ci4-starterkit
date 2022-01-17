<?php 
namespace Config;
$routes = Services::routes();

$lead_status_module_namespace = ['namespace' => 'Lead_status\Controllers'];

// Lead_status Module Routes
$routes->group('lead_status',$lead_status_module_namespace, function($routes) {
  $routes->match(['get','post'], '/', 'Lead_status::index');
  $routes->get('save', 'Lead_status::insert');
  $routes->match(['get','post'], 'update', 'Lead_status::update');
  $routes->get('delete', 'Lead_status::delete');
});
