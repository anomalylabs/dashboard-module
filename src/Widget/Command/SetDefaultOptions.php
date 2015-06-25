<?php namespace Anomaly\DashboardModule\Widget\Command;

use Anomaly\DashboardModule\Widget\WidgetExtension;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetDefaultTitleOption
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Widget\Command
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

        /**
         * Set the default options handler based
         * on the extension class. Defaulting to
         * no handler.
         */
        if (!$widget->getOption('title')) {
            $widget->setOption('title', $this->extension->getTitle());
        }
    }
}
