<?php namespace Anomaly\DashboardModule\Widget\Command;

use Anomaly\DashboardModule\Widget\WidgetExtension;
use Illuminate\Container\Container;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class LoadWidget
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Widget\Command
 */
class LoadWidget implements SelfHandling
{

    /**
     * The widget extension.
     *
     * @var WidgetExtension
     */
    protected $extension;

    /**
     * Create a BuildWidget instance.
     *
     * @param WidgetExtension $extension
     */
    public function __construct(WidgetExtension $extension)
    {
        $this->extension = $extension;
    }

    /**
     * Handle the command.
     *
     * @param Container $container
     */
    public function handle(Container $container)
    {
        $container->call($this->extension->getLoader(), ['extension' => $this->extension]);
    }
}
