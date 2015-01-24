<?php namespace Anomaly\DashboardModule\Dashboard;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class DashboardRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard
 */
class DashboardRouteProvider extends RouteServiceProvider
{

    /**
     * Map dashboard routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->any(
            'admin/dashboard',
            'Anomaly\DashboardModule\Http\Controller\Admin\DashboardController@index'
        );
        $router->any(
            'admin/dashboard/{dashboard?}',
            'Anomaly\DashboardModule\Http\Controller\Admin\DashboardController@index'
        );
    }
}
