<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report\Command\Handler;

use Anomaly\DashboardModule\Dashboard\Component\Report\Command\LoadReports;

/**
 * Class LoadReportsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report\Command\Handler
 */
class LoadReportsHandler
{

    /**
     * Handle the command.
     *
     * @param LoadReports $command
     */
    public function handle(LoadReports $command)
    {
        $dashboard = $command->getDashboard();

        foreach ($dashboard->getReports() as $report) {
            $report->make();
        }

        $dashboard->addData('reports', $dashboard->getReports());
    }
}
