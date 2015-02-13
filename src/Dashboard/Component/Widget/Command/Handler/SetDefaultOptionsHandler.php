<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget\Command\Handler;

use Anomaly\DashboardModule\Dashboard\Component\Widget\Command\SetDefaultOptions;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class SetDefaultOptionsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Widget\Command\Handler
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
        $widget    = $extension->getWidget();

        $widget->setOption('title', $widget->getOption('title', $extension->getName()));
    }
}
