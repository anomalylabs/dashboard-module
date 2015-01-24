<?php namespace Anomaly\DashboardModule\Dashboard;

use Illuminate\Support\ServiceProvider;

/**
 * Class DashboardServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard
 */
class DashboardServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'Anomaly\DashboardModule\Dashboard\Contract\DashboardRepositoryInterface',
            'Anomaly\DashboardModule\Dashboard\DashboardRepository'
        );

        $this->app->register('Anomaly\DashboardModule\Dashboard\DashboardRouteProvider');
    }
}
