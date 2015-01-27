<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report\Command\Handler;

use Anomaly\DashboardModule\Dashboard\Component\Report\Command\LoadReport;
use Illuminate\Container\Container;

/**
 * Class LoadReportHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report\Command\Handler
 */
class LoadReportHandler
{

    /**
     * The application container.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a LoadReportHandler instance.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param LoadReport $command
     */
    public function handle(LoadReport $command)
    {
        $extension = $command->getExtension();
        $report    = $extension->getReport();

        $this->container->call($extension->getHandler(), compact('report'));
    }
}
