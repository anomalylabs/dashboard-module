<?php namespace Anomaly\Streams\Addon\Module\Dashboard\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;

class DashboardController extends AdminController
{
    public function index()
    {
        return \View::make('module.dashboard::index');
    }
}