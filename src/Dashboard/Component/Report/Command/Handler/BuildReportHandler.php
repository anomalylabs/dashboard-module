<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report\Command\Handler;

use Anomaly\DashboardModule\Dashboard\Component\Report\Command\BuildReport;
use Anomaly\DashboardModule\Dashboard\Component\Report\Command\SetDefaultHandler;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class BuildReportHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report\Command\Handler
 */
class BuildReportHandler
{

    use DispatchesCommands;

    /**
     * Handle the command.
     *
     * @param BuildReport $command
     */
    public function handle(BuildReport $command)
    {
        $extension = $command->getExtension();

        $this->dispatch(new SetDefaultHandler($extension));
    }
}
