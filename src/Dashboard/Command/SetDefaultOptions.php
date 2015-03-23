<?php namespace Anomaly\DashboardModule\Dashboard\Command;

use Anomaly\DashboardModule\Dashboard\DashboardBuilder;
use Anomaly\Streams\Platform\Addon\Module\ModuleCollection;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetDefaultOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Command
 */
class SetDefaultOptions implements SelfHandling
{

    /**
     * The dashboard builder.
     *
     * @var DashboardBuilder
     */
    protected $builder;

    /**
     * Create a new SetDefaultOptions instance.
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
     * @param ModuleCollection $modules
     */
    public function handle(ModuleCollection $modules)
    {
        if ($this->builder->getDashboardOption('dashboard_view')) {
            return;
        }

        if ($module = $modules->active()) {
            $this->builder->setDashboardOption('dashboard_view', $module->getNamespace('admin/dashboard'));
        }
    }
}
