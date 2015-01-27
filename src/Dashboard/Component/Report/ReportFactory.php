<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report;

use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;

/**
 * Class ReportFactory
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report
 */
class ReportFactory
{

    /**
     * @var ExtensionCollection
     */
    protected $reports;

    /**
     * Create a new ReportFactory.
     *
     * @param ExtensionCollection $reports
     */
    public function __construct(ExtensionCollection $reports)
    {
        $this->reports = $reports;
    }

    /**
     * Make the report from the parameters.
     *
     * @param array $parameters
     */
    public function make(array $parameters)
    {
        if (!$report = $this->reports->get(array_get($parameters, 'report'))) {
            $report = app()->make(array_get($parameters, 'report'));
        }

        $this->hydrate($report, $parameters);

        return $report;
    }

    /**
     * Hydrate the report with it's remaining parameters.
     *
     * @param ReportExtension $report
     * @param array           $parameters
     */
    protected function hydrate(ReportExtension $report, array $parameters)
    {
        foreach ($parameters as $parameter => $value) {

            $method = camel_case('set_' . $parameter);

            if (method_exists($report, $method)) {
                $report->{$method}($value);
            }
        }
    }
}
