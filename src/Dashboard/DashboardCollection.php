<?php namespace Anomaly\DashboardModule\Dashboard;

use Anomaly\DashboardModule\Dashboard\Contract\DashboardInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class DashboardCollection
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\DashboardModule\Dashboard
 */
class DashboardCollection extends EntryCollection
{

    /**
     * Return only allowed dashboards.
     *
     * @return DashboardCollection
     */
    public function allowed()
    {
        /* @var UserInterface $user */
        if (!$user = app('auth')->user()) {
            return $this->make([]);
        }

        return $this->filter(
            function (DashboardInterface $dashboard) use ($user) {

                $roles = $dashboard->getAllowedRoles();

                return $roles->isEmpty() ?: $user->hasAnyRole($roles);
            }
        );
    }
}
