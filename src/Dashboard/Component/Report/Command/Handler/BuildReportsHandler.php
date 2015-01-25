<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report\Command\Handler;

use Anomaly\DashboardModule\Dashboard\Component\Report\Command\BuildReports;
use Anomaly\DashboardModule\Dashboard\Component\Report\ReportBuilder;

/**
 * Class BuildReportsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report\Command\Handler
 */
class BuildReportsHandler
{

    /**
     * The report builder.
     *
     * @var ReportBuilder
     */
    protected $builder;

    /**
     * Create a new BuildReportsHandler instance.
     *
     * @param ReportBuilder $builder
     */
    public function __construct(ReportBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param BuildReports $command
     */
    public function handle(BuildReports $command)
    {
        $this->builder->build($command->getBuilder());
    }
}
