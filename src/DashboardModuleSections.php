<?php namespace Anomaly\DashboardModule;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\Streams\Platform\Addon\Module\ModuleCollection;

/**
 * Class DashboardModuleSections
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule
 */
class DashboardModuleSections
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
     * Create a new DashboardModuleSections instance.
     *
     * @param ModuleCollection    $modules
     * @param ExtensionCollection $extensions
     */
    public function __construct(ModuleCollection $modules, ExtensionCollection $extensions)
    {
        $this->modules    = $modules;
        $this->extensions = $extensions;
    }

    /**
     * Return dashboard sections.
     *
     * @return array
     */
    public function handle()
    {
        $module = $this->modules->active();

        return array_map(
            function (Extension $extension) {
                return [
                    'slug' => $extension->getNamespace(),
                    'text' => trans($extension->getName())
                ];
            },
            $this->extensions->search($module->getNamespace('dashboard.*'))->all()
        );
    }
}
