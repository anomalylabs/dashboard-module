<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report;

use Anomaly\DashboardModule\Dashboard\DashboardBuilder;
use Illuminate\Support\Collection;

/**
 * Class ReportBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report
 */
class ReportBuilder
{

    /**
     * The input reader.
     *
     * @var ReportInput
     */
    protected $input;

    /**
     * The report factory.
     *
     * @var ReportFactory
     */
    protected $factory;

    /**
     * Create a ReportBuilder instance.
     *
     * @param ReportInput   $input
     * @param ReportFactory $factory
     */
    public function __construct(ReportInput $input, ReportFactory $factory)
    {
        $this->input   = $input;
        $this->factory = $factory;
    }

    /**
     * Build the reports.
     *
     * @param DashboardBuilder $builder
     */
    public function build(DashboardBuilder $builder)
    {
        $dashboard = $builder->getDashboard();

        $this->input->read($builder);

        foreach ($builder->getReports() as $slug => $action) {
            $dashboard->addReport($this->factory->make($action));
        }
    }
}
