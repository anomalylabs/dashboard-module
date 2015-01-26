<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report;

use Anomaly\DashboardModule\Dashboard\Component\Report\Contract\ReportInterface;
use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Support\Resolver;
use Illuminate\Container\Container;
use Illuminate\View\Factory;
use Illuminate\View\View;

/**
 * Class Report
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report
 */
class Report extends Extension implements ReportInterface
{

    /**
     * The data handler.
     *
     * @var null|string
     */
    protected $handler = null;

    /**
     * The report content.
     *
     * @var null|View
     */
    protected $content = null;

    /**
     * The view factory.
     *
     * @var Factory
     */
    protected $view;

    /**
     * The application container.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a Report instance.
     *
     * @param Container $container
     * @param Factory   $view
     */
    public function __construct(Container $container, Factory $view)
    {
        $this->view      = $view;
        $this->container = $container;
    }

    /**
     * Make the report.
     */
    public function make()
    {
        $report = $this;
        $data   = $this->runHandler();

        $this->setContent((string)$this->view->make('anomaly.module.dashboard::admin/report/index', compact('data', 'report')));
    }

    /**
     * Run the data handler.
     */
    protected function runHandler()
    {
        if (!$this->handler) {
            $this->handler = get_class($this) . 'Handler@handle';
        }

        return $this->container->call($this->handler, [$this]);
    }

    /**
     * Get the content.
     *
     * @return null|View
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the content.
     *
     * @param View $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}
