<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report;

use Anomaly\DashboardModule\Dashboard\Component\Report\Contract\ReportInterface;
use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class Report
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report
 */
class Report extends Extension implements ReportInterface
{

    /**
     * Make the report.
     */
    public function make()
    {
    }
}
