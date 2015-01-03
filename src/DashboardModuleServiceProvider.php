<?php namespace Anomaly\DashboardModule;

use Illuminate\Support\ServiceProvider;

class DashboardModuleServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Anomaly\DashboardModule\Provider\RouteServiceProvider');
    }
}
 