<?php namespace Anomaly\DashboardModule\Dashboard\Command\Handler;

use Anomaly\DashboardModule\Dashboard\Command\LoadDashboard;
use Anomaly\DashboardModule\Dashboard\Component\Widget\Command\LoadWidgets;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class LoadDashboardHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Command\Handler
 */
class LoadDashboardHandler
{

    use DispatchesCommands;

    /**
     * Handle the command.
     *
     * @param LoadDashboard $command
     */
    public function handle(LoadDashboard $command)
    {
        $this->dispatch(new LoadWidgets($command->getDashboard()));
    }
}
