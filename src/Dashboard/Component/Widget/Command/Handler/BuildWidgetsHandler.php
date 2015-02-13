<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget\Command\Handler;

use Anomaly\DashboardModule\Dashboard\Component\Widget\Command\BuildWidgets;
use Anomaly\DashboardModule\Dashboard\Component\Widget\WidgetBuilder;

/**
 * Class BuildWidgetsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Widget\Command\Handler
 */
class BuildWidgetsHandler
{

    /**
     * The widget builder.
     *
     * @var WidgetBuilder
     */
    protected $builder;

    /**
     * Create a new BuildWidgetsHandler instance.
     *
     * @param WidgetBuilder $builder
     */
    public function __construct(WidgetBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param BuildWidgets $command
     */
    public function handle(BuildWidgets $command)
    {
        $this->builder->build($command->getBuilder());
    }
}
