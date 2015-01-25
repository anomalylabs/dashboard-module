<?php namespace Anomaly\DashboardModule\Dashboard;

use Anomaly\DashboardModule\Dashboard\Contract\DashboardInterface;
use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class Dashboard
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard
 */
class Dashboard extends Extension implements DashboardInterface
{

    /**
     * The dashboard output.
     *
     * @var string
     */
    protected $output;

    /**
     * Make the dashboard.
     */
    public function make()
    {
        $this->output = view($this->getNamespace('dashboard'));
    }

    /**
     * Get the output.
     *
     * @return string
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Set the output.
     *
     * @param string $output
     */
    public function setOutput($output)
    {
        $this->output = $output;
    }
}
