<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report\Command\Handler;

use Anomaly\DashboardModule\Dashboard\Component\Report\Command\SetDefaultOptions;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class SetDefaultOptionsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report\Command\Handler
 */
class SetDefaultOptionsHandler
{

    use DispatchesCommands;

    /**
     * Handle the command.
     *
     * @param SetDefaultOptions $command
     */
    public function handle(SetDefaultOptions $command)
    {
        $extension = $command->getExtension();
        $report    = $extension->getReport();

        $report->setOption('title', $report->getOption('title', $extension->getName()));
    }
}
