<?php namespace Anomaly\DashboardModule;

use Anomaly\DashboardModule\Command\PublishAssets;
use Illuminate\Foundation\Bus\DispatchesCommands;
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

    use DispatchesCommands;

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->dispatch(new PublishAssets());
    }

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

        $this->app->register('Anomaly\DashboardModule\DashboardModuleRouteProvider');
    }
}
