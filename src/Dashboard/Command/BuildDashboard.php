<?php namespace Anomaly\DashboardModule\Dashboard\Command;

use Anomaly\DashboardModule\Dashboard\Component\Widget\Command\BuildWidgets;
use Anomaly\DashboardModule\Dashboard\DashboardBuilder;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class BuildDashboard
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Command
 */
class BuildDashboard implements SelfHandling
{

    use DispatchesCommands;

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
     * Handle the command.
     */
    public function handle()
    {
        $this->dispatch(new SetDashboardOptions($this->builder));
        $this->dispatch(new SetDefaultOptions($this->builder));
        $this->dispatch(new BuildWidgets($this->builder));
    }
}
