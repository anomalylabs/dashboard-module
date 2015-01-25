<?php namespace Anomaly\DashboardModule\Http\Controller\Admin;

use Anomaly\DashboardModule\Dashboard\DashboardBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class DashboardController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Http\Controller\Admin
 */
class DashboardController extends AdminController
{

    /**
     * Display the default dashboard.
     *
     * @param DashboardBuilder $dashboard
     * @return \Illuminate\View\View
     */
    public function index(DashboardBuilder $dashboard)
    {
        return $dashboard->render();
    }
}
