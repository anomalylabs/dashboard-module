<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget\Command;

use Anomaly\DashboardModule\Dashboard\Component\Widget\WidgetExtension;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetDefaultProperties
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Widget\Command
 */
class SetDefaultProperties implements SelfHandling
{

    /**
     * The widget extension.
     *
     * @var WidgetExtension
     */
    protected $extension;

    /**
     * Create a BuildWidget instance.
     *
     * @param WidgetExtension $extension
     */
    public function __construct(WidgetExtension $extension)
    {
        $this->extension = $extension;
    }

    /**
     * Handle the command.
     */
    public function handle()
    {
        if ($this->extension->getLoader() === null) {
            $this->extension->setLoader(
                substr(get_class($this->extension), 0, -9) . 'Loader@handle'
            ); // Replace "Extension with Loader@handle"
        }
    }
}
