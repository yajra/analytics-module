# YajraCMS Google Analytics Module

## Installation
- Install module: `composer require yajra/analytics-module`
- Publish config: `php artisan vendor:publish --provider="Spatie\Analytics\AnalyticsServiceProvider"`
- Update `.env` and add your `ANALYTICS_VIEW_ID`
- Copy and paste you google service account credentials on `storage/app/analytics/service-account-credentials.json`

## Credits
This module uses [laravel-analytics](https://github.com/spatie/laravel-analytics) package.
