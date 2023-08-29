<?php 
namespace Config;
$routes = Services::routes();

$products_module_namespace = ['namespace' => 'Products\Controllers'];

// Products Module Routes
$routes->group('products',$products_module_namespace, function($routes) {
  $routes->get('/', 'Products::index');
  $routes->post('/', 'Products::getData');
  $routes->post('save', 'Products::addOrEditProducts');
  $routes->post('getProductDataById/(:num)', 'Products::edit/$1');
  $routes->delete('deleteProductById/(:num)', 'Products::delete/$1');

  // $routes->get('/', 'Products::index');
  // $routes->get('insert', 'Products::insert');
  // $routes->get('update', 'Products::update');
  // $routes->get('delete', 'Products::delete');
});
