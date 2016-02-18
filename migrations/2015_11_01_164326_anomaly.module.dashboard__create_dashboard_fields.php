<?php

use Anomaly\DashboardModule\Dashboard\DashboardModel;
use Anomaly\Streams\Platform\Database\Migration\Migration;
use Anomaly\UsersModule\Role\RoleModel;

/**
 * Class AnomalyModuleDashboardCreateDashboardFields
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleDashboardCreateDashboardFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'name'          => 'anomaly.field_type.text',
        'slug'          => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'name'
            ]
        ],
        'description'   => 'anomaly.field_type.textarea',
        'layout'        => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'options' => [
                    '24'      => '1',
                    '12-12'   => '1-1',
                    '8-8-8'   => '1-1-1',
                    '6-12-6'  => '1-2-1',
                    '12-6-6'  => '2-1-1',
                    '6-6-12'  => '1-1-2',
                    '6-6-6-6' => '1-1-1-1'
                ]
            ]
        ],
        'title'         => 'anomaly.field_type.text',
        'extension'     => [
            'type'   => 'anomaly.field_type.addon',
            'config' => [
                'type'   => 'extension',
                'search' => 'anomaly.module.dashboard::widget.*'
            ]
        ],
        'column'        => [
            'type'   => 'anomaly.field_type.integer',
            'config' => [
                'min'           => 1,
                'default_value' => 1
            ]
        ],
        'pinned'        => 'anomaly.field_type.boolean',
        'dashboard'     => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => DashboardModel::class
            ]
        ],
        'allowed_roles' => [
            'type'   => 'anomaly.field_type.multiple',
            'config' => [
                'related' => RoleModel::class
            ]
        ]
    ];

}
