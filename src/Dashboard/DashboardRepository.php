<?php namespace Anomaly\DashboardModule\Dashboard;

use Anomaly\DashboardModule\Dashboard\Contract\DashboardInterface;
use Anomaly\DashboardModule\Dashboard\Contract\DashboardRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\Streams\Platform\Addon\Module\ModuleCollection;

/**
 * Class DashboardRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard
 */
class DashboardRepository implements DashboardRepositoryInterface
{

    /**
     * The module collection.
     *
     * @var ModuleCollection
     */
    protected $modules;

    /**
     * The extension collection.
     *
     * @var ExtensionCollection
     */
    protected $extensions;

    /**
     * Create a new DashboardRepository instance.
     *
     * @param ExtensionCollection $extensions
     * @param ModuleCollection    $modules
     */
    public function __construct(ExtensionCollection $extensions, ModuleCollection $modules)
    {
        $this->modules    = $modules;
        $this->extensions = $extensions;
    }

    /**
     * Get a dashboard.
     *
     * @param $dashboard
     * @return DashboardInterface
     */
    public function get($dashboard)
    {
        $module = $this->modules->active();

        return $this->extensions->get($module->getNamespace('dashboard.' . $dashboard));
    }

    /**
     * Get the default dashboard.
     *
     * @return DashboardInterface
     */
    public function getDefault()
    {
        $module = $this->modules->active();

        return $this->extensions->search($module->getNamespace('dashboard.*'))->first();
    }
}
