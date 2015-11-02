<?php namespace Anomaly\DashboardModule\Widget;

use Anomaly\DashboardModule\Widget\Contract\WidgetInterface;
use Anomaly\DashboardModule\Widget\Extension\Contract\WidgetExtensionInterface;
use Anomaly\Streams\Platform\Model\Dashboard\DashboardWidgetsEntryModel;
use Anomaly\UsersModule\Role\RoleCollection;

/**
 * Class WidgetModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Widget
 */
class WidgetModel extends DashboardWidgetsEntryModel implements WidgetInterface
{

    /**
     * The widget data.
     *
     * @var WidgetCollection
     */
    protected $data;

    /**
     * Create a new WidgetModel instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->data = new WidgetCollection();

        parent::__construct($attributes);
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        self::observe(app(substr(__CLASS__, 0, -5) . 'Observer'));

        parent::boot();
    }

    /**
     * Get the pinned flag.
     *
     * @return bool
     */
    public function isPinned()
    {
        return $this->pinned;
    }

    /**
     * Get the column.
     *
     * @return int
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * Get the extension.
     *
     * @return WidgetExtensionInterface
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Get the allowed roles.
     *
     * @return RoleCollection
     */
    public function getAllowedRoles()
    {
        return $this->allowedRoles()->get();
    }

    /**
     * Get the content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the content.
     *
     * @param $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the data.
     *
     * @return WidgetData
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Add to the widget data.
     *
     * @param $key
     * @param $data
     * @return $this
     */
    public function addData($key, $data)
    {
        $this->data->put($key, $data);

        return $this;
    }

    /**
     * Return the widget output.
     *
     * @return string
     */
    public function output()
    {
        $extension = $this->getExtension();

        return $extension->output($this);
    }
}
