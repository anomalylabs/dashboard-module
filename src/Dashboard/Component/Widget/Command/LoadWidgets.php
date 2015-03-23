<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget\Command;

use Anomaly\DashboardModule\Dashboard\Dashboard;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class LoadWidgets
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Widget\Command
 */
class LoadWidgets implements SelfHandling
{

    /**
     * The dashboard object.
     *
     * @var Dashboard
     */
    protected $dashboard;

    /**
     * Create a new LoadWidgets instance.
     *
     * @param Dashboard $dashboard
     */
    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    /**
     * Handle the command.
     *
     * @param LoadWidgets $command
     */
    public function handle()
    {
        // Make all widgets first.
        foreach ($this->dashboard->getWidgets() as $widget) {
            $widget->make();
        }

        $this->dashboard->addData('widgets', $this->dashboard->getWidgets());
    }
}
