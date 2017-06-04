<?php

namespace Modules\Analytics\Providers;

use Caffeinated\Menus\Item;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AnalyticsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerAdminMenu();
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/analytics');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'analytics');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'analytics');
        }
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/../Config/config.php' => config_path('analytics.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'analytics'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/analytics');

        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath,
        ]);

        $this->loadViewsFrom($sourcePath, 'analytics');
    }

    /**
     * Register module's admin menu.
     */
    protected function registerAdminMenu()
    {
        /** @var \Illuminate\Events\Dispatcher $dispatcher */
        $dispatcher = $this->app['events'];
        $dispatcher->listen('admin.menu.build', function (Item $menu) {
            $menu->add(Str::title('Analytics'), route('administrator.analytics.index'))->icon('info');
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Spatie\Analytics\AnalyticsServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
