<?php namespace Anomaly\DashboardModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;

class DashboardController extends AdminController
{

    public function index()
    {
        return view('module::index');
    }
}
