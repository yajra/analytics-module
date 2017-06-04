<?php
/**
 * Analytics module routes main entry point.
 *
 * @var \Illuminate\Routing\Router $router
 */

use Modules\Analytics\Http\Controllers\AnalyticsController;

$router = app('router');

// Front-end routes.
$router->group(['middleware' => 'web'], function() use ($router) {
	$router->resource('analytics', AnalyticsController::class);
});

// Back-end routes.
$router->group(['middleware' => 'administrator', 'prefix' => 'administrator'], function() use ($router) {
	$router->get('analytics', function() {
	    return view('analytics::backend.index');
	});
});
