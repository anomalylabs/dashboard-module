<?php namespace Anomaly\DashboardModule;

use Anomaly\DashboardModule\Command\PublishAssets;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class DashboardModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule
 */
class DashboardModuleServiceProvider extends AddonServiceProvider
{

    use DispatchesCommands;

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\DashboardModule\Dashboard\Contract\DashboardRepositoryInterface' => 'Anomaly\DashboardModule\Dashboard\DashboardRepository'
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/dashboard' => 'Anomaly\DashboardModule\Http\Controller\Admin\DashboardController@index'
    ];

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->dispatch(new PublishAssets());
    }
}
