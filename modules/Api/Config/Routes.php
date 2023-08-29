<?php

namespace Config;

$routes = Services::routes();

$module_namespace = ['namespace' => 'Api\Controllers'];

// Api Module Routes
$routes->get('/api/', 'Api::index');
