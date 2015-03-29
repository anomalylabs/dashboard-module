<?php namespace Anomaly\DashboardModule\Command;

use Anomaly\DashboardModule\DashboardModule;
use Illuminate\Container\Container;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Filesystem\Filesystem;

/**
 * Class PublishAssets
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Command
 */
class PublishAssets implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param Container       $container
     * @param DashboardModule $module
     * @param Filesystem      $files
     */
    public function handle(Container $container, DashboardModule $module, Filesystem $files)
    {
        $libraries = [
            'highcharts',
            'highmaps'
        ];

        foreach ($libraries as $library) {

            $target = $container->make('Anomaly\Streams\Platform\Application\Application')->getAssetsPath($library);

            if (!is_dir($target)) {
                $files->copyDirectory($module->getPath('resources/js/' . $library), $target);
            }
        }
    }
}
