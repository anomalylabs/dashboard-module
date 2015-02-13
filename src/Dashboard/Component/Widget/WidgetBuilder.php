<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget;

use Anomaly\DashboardModule\Dashboard\DashboardBuilder;

/**
 * Class WidgetBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Widget
 */
class WidgetBuilder
{

    /**
     * The input reader.
     *
     * @var WidgetInput
     */
    protected $input;

    /**
     * The widget factory.
     *
     * @var WidgetFactory
     */
    protected $factory;

    /**
     * Create a WidgetBuilder instance.
     *
     * @param WidgetInput   $input
     * @param WidgetFactory $factory
     */
    public function __construct(WidgetInput $input, WidgetFactory $factory)
    {
        $this->input   = $input;
        $this->factory = $factory;
    }

    /**
     * Build the widgets.
     *
     * @param DashboardBuilder $builder
     */
    public function build(DashboardBuilder $builder)
    {
        $dashboard = $builder->getDashboard();

        $this->input->read($builder);

        foreach ($builder->getWidgets() as $widget) {
            $dashboard->addWidget($this->factory->make($widget));
        }
    }
}
