<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleDashboardCreateDashboardsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleDashboardCreateDashboardsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'dashboards',
        'title_column' => 'name',
        'translatable' => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name'        => [
            'required'     => true,
            'translatable' => true
        ],
        'slug'        => [
            'required' => true,
            'unique'   => true
        ],
        'description' => [
            'translatable' => true
        ],
        'layout'      => [
            'required' => true
        ],
        'allowed_roles'
    ];

}
