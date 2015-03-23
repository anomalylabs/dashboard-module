<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget\Command;

use Anomaly\DashboardModule\Dashboard\Component\Widget\WidgetExtension;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetDefaultTitleOption
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Widget\Command
 */
class SetDefaultOptions implements SelfHandling
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
     */
    public function handle()
    {
        $widget = $this->extension->getWidget();

        $widget->setOption('title', $widget->getOption('title', $this->extension->getName()));
    }
}
