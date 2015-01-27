<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report;

use Anomaly\DashboardModule\Dashboard\Component\Report\Command\BuildReport;
use Anomaly\DashboardModule\Dashboard\Component\Report\Command\LoadReport;
use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class ReportExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report
 */
class ReportExtension extends Extension
{

    use DispatchesCommands;

    /**
     * The report handler.
     *
     * @var null|string
     */
    protected $handler = null;

    /**
     * The report object.
     *
     * @var Report
     */
    protected $report;

    /**
     * Create a ReportExtension instance.
     *
     * @param Report $report
     */
    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    /**
     * Build the report.
     */
    public function build()
    {
        $this->dispatch(new BuildReport($this));
    }

    /**
     * Make the report.
     */
    public function make()
    {
        $this->build();

        $this->dispatch(new LoadReport($this));

        $data = $this->report->getData();

        $this->report->setContent(
            view($this->getNamespace('views/content'), $data)
        );
    }

    /**
     * Render the report.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $this->make();

        $content = $this->report->getContent();

        return view(
            $this->report->getOption(
                'report_view',
                'anomaly.module.dashboard::admin/report/report'
            ),
            compact('content')
        );
    }

    /**
     * Get the report handler.
     *
     * @return null|string
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * Set the report handler.
     *
     * @param null|string $handler
     * @return $this
     */
    public function setHandler($handler)
    {
        $this->handler = $handler;

        return $this;
    }

    /**
     * Get the report.
     *
     * @return Report
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * Render the report.
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->render();
    }
}
