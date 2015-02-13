<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget\Command\Handler;

use Anomaly\DashboardModule\Dashboard\Component\Widget\Command\LoadWidget;
use Illuminate\Container\Container;

/**
 * Class LoadWidgetHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Widget\Command\Handler
 */
class LoadWidgetHandler
{

    /**
     * The application container.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a LoadWidgetHandler instance.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param LoadWidget $command
     */
    public function handle(LoadWidget $command)
    {
        $extension = $command->getExtension();
        $widget    = $extension->getWidget();

        $this->container->call($extension->getHandler(), compact('widget'));
    }
}
