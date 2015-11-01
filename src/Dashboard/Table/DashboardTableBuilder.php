<?php namespace Anomaly\DashboardModule\Dashboard\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class DashboardTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Table
 */
class DashboardTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [
        'name'
    ];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'entry.edit_link',
        'description'
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'view' => [
            'href' => 'admin/dashboard/view/{entry.slug}'
        ]
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete'
    ];

}
