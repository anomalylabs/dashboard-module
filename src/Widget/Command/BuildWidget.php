<?php namespace Anomaly\DashboardModule\Widget\Command;

use Anomaly\DashboardModule\Widget\WidgetExtension;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class BuildWidget
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Widget\Command
 */
class BuildWidget implements SelfHandling
{

    use DispatchesJobs;

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
        $this->dispatch(new SetWidgetOptions($this->extension));
        $this->dispatch(new SetDefaultProperties($this->extension));
        $this->dispatch(new SetDefaultOptions($this->extension));
    }
}
