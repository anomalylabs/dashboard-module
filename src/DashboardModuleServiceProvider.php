<?php namespace Anomaly\DashboardModule;

use Anomaly\DashboardModule\Command\PublishAssets;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

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

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/dashboard' => 'Anomaly\DashboardModule\Http\Controller\Admin\DashboardController@index'
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\DashboardModule\Dashboard\Contract\DashboardRepositoryInterface' => 'Anomaly\DashboardModule\Dashboard\DashboardRepository'
    ];

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->dispatch(new PublishAssets());
    }
}
