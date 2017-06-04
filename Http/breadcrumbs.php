<?php
/**
 * Analytics breadcrumbs registration.
 */

use Yajra\Breadcrumbs\Generator;

Breadcrumbs::register('analytics.index', function (Generator $breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Analytics', route('analytics.index'));
});

Breadcrumbs::register('administrator.analytics.index', function (Generator $breadcrumbs) {
    $breadcrumbs->parent('administrator.index');
    $breadcrumbs->push('Analytics', route('administrator.analytics.index'));
});

