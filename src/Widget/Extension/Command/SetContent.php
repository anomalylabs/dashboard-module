<?php namespace Anomaly\DashboardModule\Widget\Extension\Command;

use Anomaly\DashboardModule\Widget\Contract\WidgetInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\View\Factory;

/**
 * Class SetContent
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Widget\Extension\Command
 */
class SetContent implements SelfHandling
{

    /**
     * The widget extension.
     *
     * @var WidgetInterface
     */
    protected $widget;

    /**
     * Create a new SetContent instance.
     *
     * @param WidgetInterface $widget
     */
    public function __construct(WidgetInterface $widget)
    {
        $this->widget = $widget;
    }

    /**
     * Handle the output.
     *
     * @param Factory $view
     * @return \Illuminate\Contracts\View\View
     */
    public function handle(Factory $view)
    {
        $extension = $this->widget->getExtension();

        $this->widget->setContent($view->make($extension->getView(), ['widget' => $this->widget]));
    }
}
