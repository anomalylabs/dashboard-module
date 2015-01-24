<?php namespace Anomaly\DashboardModule\Http\Controller\Admin;

use Anomaly\DashboardModule\Dashboard\Contract\DashboardRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class DashboardController extends AdminController
{

    public function index($dashboard = null, DashboardRepositoryInterface $dashboards)
    {
        $dashboard = $dashboards->get($dashboard);

        if (!$dashboard) {
            $dashboard = $dashboards->getDefault();
        }

        return view('anomaly.module.dashboard::admin/index', compact('dashboard'));
    }
}
