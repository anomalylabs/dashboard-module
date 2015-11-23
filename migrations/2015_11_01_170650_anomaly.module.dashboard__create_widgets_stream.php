<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleDashboardCreateWidgetsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleDashboardCreateWidgetsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'widgets',
        'title_column' => 'title',
        'translatable' => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'title'       => [
            'required'     => true,
            'translatable' => true
        ],
        'description' => [
            'translatable' => true
        ],
        'extension'   => [
            'required' => true
        ],
        'column'      => [
            'required' => true
        ],
        'dashboard'   => [
            'required' => true
        ],
        'allowed_roles',
        'pinned'
    ];

}
