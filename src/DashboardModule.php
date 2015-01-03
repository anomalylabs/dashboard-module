<?php namespace Anomaly\DashboardModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class DashboardModule extends Module
{

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'dashboard' => [
            'url' => 'admin/dashboard',
        ],
    ];
}
