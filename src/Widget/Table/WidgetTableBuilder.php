<?php namespace Anomaly\DashboardModule\Widget\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class WidgetTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Widget\Table
 */
class WidgetTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [
        'title',
        'dashboard',
        'extension'
    ];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'title',
        'dashboard',
        'entry.extension.title'
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit'
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
