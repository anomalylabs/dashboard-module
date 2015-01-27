<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report\Command\Handler;

use Anomaly\DashboardModule\Dashboard\Component\Report\Command\BuildReport;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class SetDefaultHandlerHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report\Command\Handler
 */
class SetDefaultHandlerHandler
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

        if ($extension->getHandler() === null) {
            $extension->setHandler(get_class($extension) . 'Handler@handle');
        }
    }
}
