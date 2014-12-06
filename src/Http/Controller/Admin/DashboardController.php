<?php namespace Anomaly\Streams\Addon\Module\Dashboard\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;

class DashboardController extends AdminController
{

    public function index()
    {
        return view('module::index');
    }
}
 