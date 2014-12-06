<?php namespace Anomaly\Streams\Addon\Module\Dashboard;

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
        $this->app->register('Anomaly\Streams\Addon\Module\Dashboard\Provider\RouteServiceProvider');
    }
}
 