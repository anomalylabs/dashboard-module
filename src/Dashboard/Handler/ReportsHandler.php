<?php namespace Anomaly\DashboardModule\Dashboard\Handler;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\Streams\Platform\Addon\Module\ModuleCollection;

/**
 * Class ReportsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Handler
 */
class ReportsHandler
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
     * Create a ReportHandler instance.
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
     * Return the dashboard's reports.
     *
     * @return array
     */
    public function handle()
    {
        $module = $this->modules->active();

        return array_map(
            function (Extension $report) {
                return $report->getIdentifier();
            },
            $this->extensions->search($module->getNamespace('report.*'))->all()
        );
    }
}
