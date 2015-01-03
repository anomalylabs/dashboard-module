<?php namespace Anomaly\DashboardModule\Provider;

class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{

    /**
     * The controller namespace prefix for this addon.
     *
     * @var string
     */
    protected $prefix = 'Anomaly\DashboardModule\Http\Controller\\';

    /**
     * Define the routes for the application.
     */
    public function map()
    {
        $this->registerDashboardRoutes();
    }

    /**
     * Register user routes.
     */
    private function registerDashboardRoutes()
    {
        app('router')->any('admin/dashboard', $this->prefix . 'Admin\DashboardController@index');
    }
}
 