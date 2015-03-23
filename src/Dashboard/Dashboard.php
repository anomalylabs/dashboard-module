<?php namespace Anomaly\DashboardModule\Dashboard;

use Anomaly\DashboardModule\Dashboard\Component\Widget\WidgetExtension;
use Anomaly\DashboardModule\Dashboard\Contract\DashboardInterface;
use Illuminate\Support\Collection;
use Illuminate\View\View;

/**
 * Class Dashboard
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard
 */
class Dashboard implements DashboardInterface
{

    /**
     * The dashboard content.
     *
     * @var null|View
     */
    protected $content = null;

    /**
     * The dashboard view data.
     *
     * @var Collection
     */
    protected $data;

    /**
     * The dashboard options.
     *
     * @var Collection
     */
    protected $options;

    /**
     * The dashboard widgets.
     *
     * @var Collection
     */
    protected $widgets;

    /**
     * Create a new Dashboard instance.
     *
     * @param Collection $data
     * @param Collection $options
     * @param Collection $widgets
     */
    function __construct(Collection $data, Collection $options, Collection $widgets)
    {
        $this->data    = $data;
        $this->options = $options;
        $this->widgets = $widgets;
    }

    /**
     * Get the content.
     *
     * @return View|null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the content.
     *
     * @param View $content
     * @return $this
     */
    public function setContent(View $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the data.
     *
     * @return Collection
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Add data to the data collection.
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function addData($key, $value)
    {
        $this->data->put($key, $value);

        return $this;
    }

    /**
     * Get the options.
     *
     * @return Collection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set an option.
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function setOption($key, $value)
    {
        $this->options->put($key, $value);

        return $this;
    }

    /**
     * Get an option value.
     *
     * @param      $key
     * @param null $default
     * @return mixed
     */
    public function getOption($key, $default = null)
    {
        return $this->options->get($key, $default);
    }

    /**
     * Get the widgets.
     *
     * @return Collection
     */
    public function getWidgets()
    {
        return $this->widgets;
    }

    /**
     * Add a widget to the widget collection.
     *
     * @param WidgetExtension $widget
     */
    public function addWidget(WidgetExtension $widget)
    {
        $this->widgets->put($widget->getSlug(), $widget);
    }
}
