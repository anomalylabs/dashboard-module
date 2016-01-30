<?php namespace Anomaly\DashboardModule\Http\Controller\Admin;

use Anomaly\DashboardModule\Dashboard\Contract\DashboardInterface;
use Anomaly\DashboardModule\Dashboard\Contract\DashboardRepositoryInterface;
use Anomaly\DashboardModule\Dashboard\Form\DashboardFormBuilder;
use Anomaly\DashboardModule\Dashboard\Table\DashboardTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class DashboardsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Http\Controller\Admin
 */
class DashboardsController extends AdminController
{

    /**
     * Display a management index of existing entries.
     *
     * @param DashboardRepositoryInterface $dashboards
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function index(DashboardRepositoryInterface $dashboards)
    {
        /* @var DashboardInterface $dashboard */
        if (!$dashboard = $dashboards->allowed()->first()) {
            return $this->redirect->to('admin/dashboard/manage');
        }

        return $this->redirect->to('admin/dashboard/view/' . $dashboard->getSlug());
    }

    /**
     * Display a management index of existing entries.
     *
     * @param DashboardTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function manage(DashboardTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param DashboardFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(DashboardFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param DashboardFormBuilder $form
     * @param                      $id
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
     * @param Guard                        $guard
     * @param                              $dashboard
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function view(DashboardRepositoryInterface $dashboards, Guard $guard, $dashboard)
    {
        if (!$dashboard = $dashboards->findBySlug($dashboard)) {
            abort(404);
        }

        /* @var UserInterface $user */
        $user = $guard->user();

        $roles = $dashboard->getAllowedRoles();

        if (!$roles->isEmpty() && !$user->hasAnyRole($dashboard->getAllowedRoles())) {
            abort(403);
        }

        $widgets = $dashboard->getWidgets();

        return $this->view->make('module::admin/dashboards/dashboard', compact('dashboard', 'widgets'));
    }
}
