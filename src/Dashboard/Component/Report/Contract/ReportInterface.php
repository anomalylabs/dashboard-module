<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report\Contract;

/**
 * Interface ReportInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report\Contract
 */
interface ReportInterface
{

    /**
     * Get the report slug.
     *
     * @return string
     */
    public function getSlug();
}
