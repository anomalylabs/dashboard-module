<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget;

use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\Streams\Platform\Support\Hydrator;

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
     * The hydrator utility.
     *
     * @var Hydrator
     */
    protected $hydrator;

    /**
     * Create a new WidgetFactory.
     *
     * @param ExtensionCollection $widgets
     * @param Hydrator            $hydrator
     */
    public function __construct(ExtensionCollection $widgets, Hydrator $hydrator)
    {
        $this->widgets  = $widgets;
        $this->hydrator = $hydrator;
    }

    /**
     * Make the widget from the parameters.
     *
     * @param array $parameters
     */
    public function make(array $parameters)
    {
        if (!$widget = $this->widgets->find(array_get($parameters, 'widget'))) {
            $widget = app()->make(array_get($parameters, 'widget'));
        }

        $this->hydrator->hydrate($widget, $parameters);

        return $widget;
    }
}
