<?php 
namespace Config;
$routes = Services::routes();

$settings_module_namespace = ['namespace' => 'Settings\Controllers', 'filter' => 'session'];

// Settings Module Routes
$routes->group('settings',$settings_module_namespace, function($routes) {
	$routes->get('/', 'Settings::index');
	$routes->post('settings_view', 'Settings::settings_view');
	$routes->post('save_email_settings', 'Settings::save_email_settings');
	$routes->post('save', 'Settings::save');
	$routes->post('delete/(:any)', 'Settings::delete/$1');
	$routes->get('database_table', 'Settings::database_table');
	$routes->post('export_database', 'Settings::export_database');
	$routes->post('send_test_mail', 'Settings::send_test_mail');
});
