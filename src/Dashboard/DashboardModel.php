<?php namespace Anomaly\DashboardModule\Dashboard;

use Anomaly\DashboardModule\Dashboard\Contract\DashboardInterface;
use Anomaly\DashboardModule\Widget\WidgetModel;
use Anomaly\Streams\Platform\Model\Dashboard\DashboardDashboardsEntryModel;
use Anomaly\UsersModule\Role\RoleCollection;

/**
 * Class DashboardModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard
 */
class DashboardModel extends DashboardDashboardsEntryModel implements DashboardInterface
{

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        self::observe(app(substr(__CLASS__, 0, -5) . 'Observer'));

        parent::boot();
    }

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * Get the related widgets.
     *
     * @return \Anomaly\Streams\Platform\Entry\EntryPresenter|mixed
     */
    public function getWidgets()
    {
        return $this->widgets;
    }

    /**
     * Return the widget relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function widgets()
    {
        return $this->hasMany(WidgetModel::class, 'dashboard_id');
    }
}
