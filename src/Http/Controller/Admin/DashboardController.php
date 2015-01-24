<?php namespace Anomaly\DashboardModule\Http\Controller\Admin;

use Anomaly\DashboardModule\Dashboard\Contract\DashboardRepositoryInterface;
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
     * The dashboard repository.
     *
     * @var DashboardRepositoryInterface
     */
    protected $dashboards;

    /**
     * Create a new DashboardController instance.
     *
     * @param DashboardRepositoryInterface $dashboards
     */
    public function __construct(DashboardRepositoryInterface $dashboards)
    {
        $this->dashboards = $dashboards;
    }

    /**
     * Display the dashboard.
     *
     * @param null $dashboard
     * @return \Illuminate\View\View
     */
    public function index($dashboard = null)
    {
        $dashboard = $this->dashboards->get($dashboard);

        if (!$dashboard) {
            $dashboard = $this->dashboards->getDefault();
        }

        return view('anomaly.module.dashboard::admin/index', compact('dashboard'));
    }
}
