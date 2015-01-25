<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report\Command;

use Anomaly\DashboardModule\Dashboard\Dashboard;

/**
 * Class LoadReports
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report\Command
 */
class LoadReports
{

    /**
     * The dashboard object.
     *
     * @var Dashboard
     */
    protected $dashboard;

    /**
     * Create a new LoadReports instance.
     *
     * @param Dashboard $dashboard
     */
    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    /**
     * Get the dashboard.
     *
     * @return Dashboard
     */
    public function getDashboard()
    {
        return $this->dashboard;
    }
}
