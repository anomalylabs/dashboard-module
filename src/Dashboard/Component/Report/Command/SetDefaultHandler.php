<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report\Command;

use Anomaly\DashboardModule\Dashboard\Component\Report\ReportExtension;

/**
 * Class SetDefaultHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report\Command
 */
class SetDefaultHandler
{

    /**
     * The report extension.
     *
     * @var ReportExtension
     */
    protected $extension;

    /**
     * Create a BuildReport instance.
     *
     * @param ReportExtension $extension
     */
    public function __construct(ReportExtension $extension)
    {
        $this->extension = $extension;
    }

    /**
     * Get the report extension.
     *
     * @return ReportExtension
     */
    public function getExtension()
    {
        return $this->extension;
    }
}
