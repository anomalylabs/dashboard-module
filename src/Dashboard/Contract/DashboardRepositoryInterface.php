<?php namespace Anomaly\DashboardModule\Dashboard\Contract;

/**
 * Interface DashboardRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Contract
 */
interface DashboardRepositoryInterface
{

    /**
     * Get a dashboard.
     *
     * @param $dashboard
     * @return DashboardInterface
     */
    public function get($dashboard);

    /**
     * Get the default dashboard.
     *
     * @return DashboardInterface
     */
    public function getDefault();
}
