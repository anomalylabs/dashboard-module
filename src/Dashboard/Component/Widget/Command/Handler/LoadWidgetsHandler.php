<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget\Command\Handler;

use Anomaly\DashboardModule\Dashboard\Component\Widget\Command\LoadWidgets;

/**
 * Class LoadWidgetsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Widget\Command\Handler
 */
class LoadWidgetsHandler
{

    /**
     * Handle the command.
     *
     * @param LoadWidgets $command
     */
    public function handle(LoadWidgets $command)
    {
        $dashboard = $command->getDashboard();

        foreach ($dashboard->getWidgets() as $widget) {
            $widget->make();
        }

        $dashboard->addData('widgets', $dashboard->getWidgets());
    }
}
