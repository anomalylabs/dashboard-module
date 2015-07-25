<?php namespace Anomaly\DashboardModule\Widget;

use Anomaly\DashboardModule\Widget\Command\BuildWidget;
use Anomaly\DashboardModule\Widget\Command\LoadWidget;
use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Support\Collection;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class WidgetExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Widget
 */
class WidgetExtension extends Extension
{

    use DispatchesJobs;

    /**
     * The widget loader.
     *
     * @var null|string
     */
    protected $loader = null;

    /**
     * The widget options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * The widget object.
     *
     * @var Widget
     */
    protected $widget;

    /**
     * Create a WidgetExtension instance.
     *
     * @param Widget $widget
     */
    public function __construct(Widget $widget)
    {
        $this->widget = $widget;
    }

    /**
     * Build the widget.
     */
    public function build()
    {
        $this->dispatch(new BuildWidget($this));
    }

    /**
     * Make the widget.
     */
    public function make()
    {
        $this->build();

        $this->dispatch(new LoadWidget($this));

        $data = $this->widget->getData();

        $this->widget->setContent(
            view($this->getNamespace('content'), $data)
        );
    }

    /**
     * Render the widget.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $this->make();

        $content = $this->widget->getContent();
        $options = $this->widget->getOptions();

        return view(
            $this->widget->getOption(
                'widget_view',
                'anomaly.module.dashboard::admin/widget'
            ),
            compact('content', 'options')
        );
    }

    /**
     * Get the widget loader.
     *
     * @return null|string
     */
    public function getLoader()
    {
        return $this->loader;
    }

    /**
     * Set the widget loader.
     *
     * @param null|string $loader
     * @return $this
     */
    public function setLoader($loader)
    {
        $this->loader = $loader;

        return $this;
    }

    /**
     * Get the widget.
     *
     * @return Widget
     */
    public function getWidget()
    {
        return $this->widget;
    }

    /**
     * Get the options.
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Get an option.
     *
     * @param      $key
     * @param null $default
     * @return mixed
     */
    public function getOption($key, $default = null)
    {
        return array_get($this->options, $key, $default);
    }

    /**
     * Set the options.
     *
     * @param $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Set an option.
     *
     * @param      $key
     * @param      $value
     * @return $this
     */
    public function setOption($key, $value)
    {
        array_set($this->options, $key, $value);

        return $this;
    }

    /**
     * Get the widget title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->getNamespace('addon.title');
    }

    /**
     * Get a widget option.
     *
     * @param      $key
     * @param null $default
     * @return mixed
     */
    public function getWidgetOption($key, $default = null)
    {
        return $this->widget->getOption($key, $default);
    }

    /**
     * Set a widget option value.
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function setWidgetOption($key, $value)
    {
        $this->widget->setOption($key, $value);

        return $this;
    }

    /**
     * Add data to the widget.
     *
     * @param $key
     * @param $data
     * @return $this
     */
    public function addWidgetData($key, $data)
    {
        $this->widget->addData($key, $data);

        return $this;
    }

    /**
     * Get the widget's data.
     *
     * @return Collection
     */
    public function getWidgetData()
    {
        return $this->widget->getData();
    }

    /**
     * Render the widget.
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->render();
    }
}
