<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget;

use Anomaly\DashboardModule\Dashboard\DashboardBuilder;

/**
 * Class WidgetNormalizer
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Widget
 */
class WidgetNormalizer
{

    /**
     * Normalize widget input.
     *
     * @param DashboardBuilder $builder
     */
    public function normalize(DashboardBuilder $builder)
    {
        $widgets = $builder->getWidgets();

        foreach ($widgets as &$widget) {

            /**
             * If the widget is a a string and there is no slug
             * then use the widget as the widget parameter.
             */
            if (is_string($widget)) {
                $widget = compact('widget');
            }
        }

        $builder->setWidgets($widgets);
    }
}
