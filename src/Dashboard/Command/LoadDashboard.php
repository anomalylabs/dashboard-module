<?php namespace Anomaly\DashboardModule\Dashboard\Command;

use Anomaly\DashboardModule\Dashboard\Component\Widget\Command\LoadWidgets;
use Anomaly\DashboardModule\Dashboard\Dashboard;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class LoadDashboard
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Command
 */
class LoadDashboard implements SelfHandling
{

    use DispatchesCommands;

    /**
     * The dashboard object.
     *
     * @var Dashboard
     */
    protected $dashboard;

    /**
     * Create a new LoadDashboard instance.
     *
     * @param Dashboard $dashboard
     */
    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    /**
     * Handle the command.
     */
    public function handle()
    {
        $this->dispatch(new LoadWidgets($this->dashboard));
    }
}
