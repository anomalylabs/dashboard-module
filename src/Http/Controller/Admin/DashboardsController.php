<?php namespace Anomaly\DashboardModule\Http\Controller\Admin;

use Anomaly\DashboardModule\Dashboard\Contract\DashboardInterface;
use Anomaly\DashboardModule\Dashboard\Contract\DashboardRepositoryInterface;
use Anomaly\DashboardModule\Dashboard\Form\DashboardFormBuilder;
use Anomaly\DashboardModule\Dashboard\Table\DashboardTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class DashboardsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class DashboardsController extends AdminController
{

    /**
     * Display a management index of existing entries.
     *
     * @param  DashboardRepositoryInterface $dashboards
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function index(DashboardRepositoryInterface $dashboards)
    {
        $dashboards = $dashboards->allowed();

        /* @var DashboardInterface $dashboard */
        if (!$dashboard = $dashboards->first()) {
            return redirect('admin/dashboard/manage');
        }

        return redirect('admin/dashboard/view/' . $dashboard->getSlug());
    }

    /**
     * Display a management index of existing entries.
     *
     * @param  DashboardTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function manage(DashboardTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param  DashboardFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(DashboardFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param  DashboardFormBuilder $form
     * @param                                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(DashboardFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * View a dashboard.
     *
     * @param DashboardRepositoryInterface $dashboards
     * @param $dashboard
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(DashboardRepositoryInterface $dashboards, $dashboard)
    {
        $dashboards = $dashboards->allowed();

        /* @var DashboardInterface $dashboard */
        if (!$dashboard = $dashboards->find($dashboard)) {
            abort(404);
        }

        $dashboard->setActive(true);

        $user  = user();
        $roles = $dashboard->getAllowedRoles();

        if (!$roles->isEmpty() && !$user->hasAnyRole($roles)) {
            abort(403);
        }

        share('show_banner', true);

        return view(
            'module::admin/dashboards/dashboard',
            [
                'dashboard'  => $dashboard,
                'dashboards' => $dashboards,
            ]
        );
    }
}
