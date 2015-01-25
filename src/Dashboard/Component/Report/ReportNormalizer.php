<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report;

/**
 * Class ReportNormalizer
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report
 */
class ReportNormalizer
{

    /**
     * Normalize report input.
     *
     * @param array $reports
     * @return array
     */
    public function normalize(array $reports)
    {
        foreach ($reports as &$report) {

            /**
             * If the report is a a string and there is no slug
             * then use the report as the report parameter.
             */
            if (is_string($report)) {
                $report = compact('report');
            }
        }

        return $reports;
    }
}
