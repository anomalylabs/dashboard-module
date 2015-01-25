<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report\Contract;

use Anomaly\Streams\Platform\Addon\Extension\Contract\ExtensionInterface;

/**
 * Interface ReportInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report\Contract
 */
interface ReportInterface extends ExtensionInterface
{

    /**
     * Make the report.
     */
    public function make();
}
