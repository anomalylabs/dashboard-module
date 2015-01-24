<?php namespace Anomaly\DashboardModule;

use Illuminate\Support\ServiceProvider;

/**
 * Class DashboardModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule
 */
class DashboardModuleServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Anomaly\DashboardModule\Dashboard\DashboardServiceProvider');
    }
}
