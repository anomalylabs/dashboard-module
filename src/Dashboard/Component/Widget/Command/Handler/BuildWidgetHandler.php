<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget\Command\Handler;

use Anomaly\DashboardModule\Dashboard\Component\Widget\Command\BuildWidget;
use Anomaly\DashboardModule\Dashboard\Component\Widget\Command\SetDefaultHandler;
use Anomaly\DashboardModule\Dashboard\Component\Widget\Command\SetDefaultOptions;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class BuildWidgetHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Widget\Command\Handler
 */
class BuildWidgetHandler
{

    use DispatchesCommands;

    /**
     * Handle the command.
     *
     * @param BuildWidget $command
     */
    public function handle(BuildWidget $command)
    {
        $extension = $command->getExtension();

        $this->dispatch(new SetDefaultHandler($extension));
        $this->dispatch(new SetDefaultOptions($extension));
    }
}
