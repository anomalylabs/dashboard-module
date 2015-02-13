<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget;

use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;

/**
 * Class WidgetFactory
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Widget
 */
class WidgetFactory
{

    /**
     * @var ExtensionCollection
     */
    protected $widgets;

    /**
     * Create a new WidgetFactory.
     *
     * @param ExtensionCollection $widgets
     */
    public function __construct(ExtensionCollection $widgets)
    {
        $this->widgets = $widgets;
    }

    /**
     * Make the widget from the parameters.
     *
     * @param array $parameters
     */
    public function make(array $parameters)
    {
        if (!$widget = $this->widgets->get(array_get($parameters, 'widget'))) {
            $widget = app()->make(array_get($parameters, 'widget'));
        }

        $this->hydrate($widget, $parameters);

        return $widget;
    }

    /**
     * Hydrate the widget with it's remaining parameters.
     *
     * @param WidgetExtension $widget
     * @param array           $parameters
     */
    protected function hydrate(WidgetExtension $widget, array $parameters)
    {
        foreach ($parameters as $parameter => $value) {

            $method = camel_case('set_' . $parameter);

            if (method_exists($widget, $method)) {
                $widget->{$method}($value);
            }
        }
    }
}
