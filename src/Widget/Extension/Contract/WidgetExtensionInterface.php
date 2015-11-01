<?php namespace Anomaly\DashboardModule\Widget\Extension\Contract;

use Anomaly\DashboardModule\Widget\Contract\WidgetInterface;

/**
 * Interface WidgetExtensionInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Widget\Extension\Contract
 */
interface WidgetExtensionInterface
{

    /**
     * Return the widget output.
     *
     * @param WidgetInterface $widget
     * @return \Illuminate\Contracts\View\View
     */
    public function output(WidgetInterface $widget);

    /**
     * Get the view.
     *
     * @return string
     */
    public function getView();

    /**
     * Set the view.
     *
     * @param $view
     * @return $this
     */
    public function setView($view);

    /**
     * Get the wrapper.
     *
     * @return string
     */
    public function getWrapper();

    /**
     * Set the wrapper.
     *
     * @param $wrapper
     * @return $this
     */
    public function setWrapper($wrapper);
}
