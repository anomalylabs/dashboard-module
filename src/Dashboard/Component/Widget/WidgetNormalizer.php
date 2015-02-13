<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget;

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
     * @param array $widgets
     * @return array
     */
    public function normalize(array $widgets)
    {
        foreach ($widgets as &$widget) {

            /**
             * If the widget is a a string and there is no slug
             * then use the widget as the widget parameter.
             */
            if (is_string($widget)) {
                $widget = compact('widget');
            }
        }

        return $widgets;
    }
}
