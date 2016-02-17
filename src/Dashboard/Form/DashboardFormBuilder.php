<?php namespace Anomaly\DashboardModule\Dashboard\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class DashboardFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Form
 */
class DashboardFormBuilder extends FormBuilder
{

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [
        'redirect' => 'admin/dashboard/manage'
    ];

}
