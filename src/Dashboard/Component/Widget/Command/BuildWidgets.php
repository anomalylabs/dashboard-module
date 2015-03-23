<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget\Command;

use Anomaly\DashboardModule\Dashboard\Component\Widget\WidgetBuilder;
use Anomaly\DashboardModule\Dashboard\DashboardBuilder;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class BuildWidgetsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Widget\Command
 */
class BuildWidgets implements SelfHandling
{

    /**
     * The dashboard builder.
     *
     * @var DashboardBuilder
     */
    protected $builder;

    /**
     * Create a new BuildWidgetsHandler instance.
     *
     * @param DashboardBuilder $builder
     */
    public function __construct(DashboardBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param WidgetBuilder $builder
     */
    public function handle(WidgetBuilder $builder)
    {
        $builder->build($this->builder);
    }
}
