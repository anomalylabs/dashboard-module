<?php namespace Anomaly\DashboardModule\Dashboard\Command;

use Anomaly\DashboardModule\Dashboard\DashboardBuilder;

/**
 * Class BuildDashboard
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Command
 */
class BuildDashboard
{

    /**
     * The dashboard builder.
     *
     * @var DashboardBuilder
     */
    protected $builder;

    /**
     * Create a new BuildDashboard instance.
     *
     * @param DashboardBuilder $builder
     */
    public function __construct(DashboardBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Get the builder.
     *
     * @return DashboardBuilder
     */
    public function getBuilder()
    {
        return $this->builder;
    }
}
