<?php namespace Anomaly\DashboardModule\Command\Handler;

use Anomaly\DashboardModule\DashboardModule;
use Illuminate\Config\Repository;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;

/**
 * Class PublishAssetsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Command\Handler
 */
class PublishAssetsHandler
{

    /**
     * The file system.
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The dashboard module.
     *
     * @var DashboardModule
     */
    protected $module;

    /**
     * The application container.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a PublishAssetsHandler instance.
     *
     * @param Container  $container
     * @param Repository $config
     * @param Filesystem $files
     */
    function __construct(Container $container, Repository $config, DashboardModule $module, Filesystem $files)
    {
        $this->files     = $files;
        $this->config    = $config;
        $this->module    = $module;
        $this->container = $container;
    }

    /**
     * Handle the command.
     */
    public function handle()
    {
        $libraries = [
            'highcharts',
            'highmaps'
        ];

        foreach ($libraries as $library) {

            $target = $this->container->make('streams.asset.path') . '/' . $library;

            if ($this->config->get('app.debug') and !is_dir($target)) {
                $this->files->copyDirectory($this->module->getPath('resources/js/' . $library), $target);
            }
        }
    }
}
