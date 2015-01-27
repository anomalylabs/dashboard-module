<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report\Command\Handler;

use Anomaly\DashboardModule\Dashboard\Component\Report\Command\SetDefaultHandler;
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
     * @param SetDefaultHandler $command
     */
    public function handle(SetDefaultHandler $command)
    {
        $extension = $command->getExtension();

        if ($extension->getHandler() === null) {
            $extension->setHandler(substr(get_class($extension), 0, -9) . 'Handler@handle'); // Replace "Extension"
        }
    }
}
