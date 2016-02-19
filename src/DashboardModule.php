<?php namespace Anomaly\DashboardModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class DashboardModule
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\DashboardModule
 */
class DashboardModule extends Module
{

    /**
     * The module icon.
     *
     * @var string
     */
    protected $icon = 'dashboard';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'dashboards' => [
            'buttons' => [
                'new_dashboard' => [
                    'enabled' => 'admin/dashboard/manage'
                ],
                'manage'        => [
                    'type'    => 'info',
                    'icon'    => 'wrench',
                    'enabled' => 'admin/dashboard/view/*'
                ],
                'new_widget'    => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/dashboard/widgets/choose',
                    'enabled'     => 'admin/dashboard/view/*',
                ],
            ]
        ],
        'widgets'    => [
            'buttons' => [
                'new_widget' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/dashboard/widgets/choose'
                ]
            ]
        ]
    ];

}
