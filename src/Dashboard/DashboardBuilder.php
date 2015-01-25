<?php namespace Anomaly\DashboardModule\Dashboard;

use Anomaly\DashboardModule\Dashboard\Command\BuildDashboard;
use Anomaly\DashboardModule\Dashboard\Command\LoadDashboard;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class DashboardBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard
 */
class DashboardBuilder
{

    use DispatchesCommands;

    /**
     * The dashboard reports.
     *
     * @var string|array
     */
    protected $reports = 'Anomaly\DashboardModule\Dashboard\Handler\ReportsHandler@handle';

    /**
     * The dashboard object.
     *
     * @var Dashboard
     */
    protected $dashboard;

    /**
     * Create a new DashboardBuilder instance.
     *
     * @param Dashboard $dashboard
     */
    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    /**
     * Build the dashboard.
     */
    public function build()
    {
        $this->dispatch(new BuildDashboard($this));
    }

    /**
     * Make the dashboard
     */
    public function make()
    {
        $this->build();

        $this->dispatch(new LoadDashboard($this->dashboard));

        $options = $this->dashboard->getOptions();
        $data    = $this->dashboard->getData();

        $this->dashboard->setContent(
            view($options->get('dashboard_view', 'anomaly.module.dashboard::admin/dashboard/index'), $data)
        );
    }

    /**
     * Render the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $this->make();

        $options = $this->dashboard->getOptions();
        $content = $this->dashboard->getContent();

        return view($options->get('wrapper_view', 'streams::blank'), compact('content'));
    }

    /**
     * Get the dashboard.
     *
     * @return Dashboard
     */
    public function getDashboard()
    {
        return $this->dashboard;
    }

    /**
     * Get the reports.
     *
     * @return null|array|string
     */
    public function getReports()
    {
        return $this->reports;
    }

    /**
     * Set the reports.
     *
     * @param array $reports
     * @return $this
     */
    public function setReports(array $reports)
    {
        $this->reports = $reports;

        return $this;
    }
}
