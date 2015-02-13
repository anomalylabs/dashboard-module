<?php namespace Anomaly\DashboardModule\Dashboard;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\Streams\Platform\Addon\Module\ModuleCollection;

/**
 * Class DashboardWidgets
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Handler
 */
class DashboardWidgets
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
     * Create a WidgetHandler instance.
     *
     * @param ModuleCollection    $modules
     * @param ExtensionCollection $extensions
     */
    function __construct(ModuleCollection $modules, ExtensionCollection $extensions)
    {
        $this->modules    = $modules;
        $this->extensions = $extensions;
    }

    /**
     * Handle loading the dashboard widgets.
     *
     * @param DashboardBuilder $builder
     * @return array
     */
    public function handle(DashboardBuilder $builder)
    {
        $module = $this->modules->active();

        $builder->setWidgets(
            array_map(
                function (Extension $widget) {
                    return $widget->getProvides();
                },
                $this->extensions->search($module->getNamespace('widget.*'))->all()
            )
        );
    }
}
