<?php
/**
 * Analytics module routes main entry point.
 *
 * @var \Illuminate\Routing\Router $router
 */

use Modules\Analytics\Http\Controllers\AnalyticsController;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;

$router = app('router');

// Front-end routes.
$router->group(['middleware' => 'web'], function () use ($router) {
    $router->resource('analytics', AnalyticsController::class);
});

// Back-end routes.
$router->group([
    'middleware' => 'administrator',
    'prefix'     => 'administrator',
    'as'         => 'administrator.',
], function () use ($router) {
    $router->get('analytics', function (Analytics $analytics) {
        return $analytics->fetchVisitorsAndPageViews(Period::days(7));
    })->name('analytics.index');
});
