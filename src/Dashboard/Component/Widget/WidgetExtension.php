<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget;

use Anomaly\DashboardModule\Dashboard\Component\Widget\Command\BuildWidget;
use Anomaly\DashboardModule\Dashboard\Component\Widget\Command\LoadWidget;
use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class WidgetExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Widget
 */
class WidgetExtension extends Extension
{

    use DispatchesCommands;

    /**
     * The widget handler.
     *
     * @var null|string
     */
    protected $handler = null;

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
     * Get the widget handler.
     *
     * @return null|string
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * Set the widget handler.
     *
     * @param null|string $handler
     * @return $this
     */
    public function setHandler($handler)
    {
        $this->handler = $handler;

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
     * Render the widget.
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->render();
    }
}
