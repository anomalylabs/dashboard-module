<?php namespace Anomaly\DashboardModule\Dashboard\Command\Handler;

use Anomaly\DashboardModule\Dashboard\Command\BuildDashboard;
use Anomaly\DashboardModule\Dashboard\Component\Widget\Command\BuildWidgets;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class BuildDashboardHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Command\Handler
 */
class BuildDashboardHandler
{

    use DispatchesCommands;

    /**
     * Handle the command.
     *
     * @param BuildDashboard $command
     */
    public function handle(BuildDashboard $command)
    {
        $this->dispatch(new BuildWidgets($command->getBuilder()));
    }
}
