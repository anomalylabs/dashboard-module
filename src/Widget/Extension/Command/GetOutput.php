<?php namespace Anomaly\DashboardModule\Widget\Extension\Command;

use Anomaly\DashboardModule\Widget\Contract\WidgetInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\View\Factory;

/**
 * Class GetOutput
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\DashboardModule\Widget\Extension\Command
 */
class GetOutput implements SelfHandling
{

    /**
     * The widget extension.
     *
     * @var WidgetInterface
     */
    protected $widget;

    /**
     * Create a new GetOutput instance.
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

        return $view->make($extension->getWrapper(), ['widget' => $this->widget]);
    }
}
