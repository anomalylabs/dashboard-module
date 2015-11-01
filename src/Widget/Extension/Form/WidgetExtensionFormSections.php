<?php namespace Anomaly\DashboardModule\Widget\Extension\Form;

/**
 * Class WidgetExtensionFormSections
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Widget\Extension\Form
 */
class WidgetExtensionFormSections
{

    /**
     * Handle the form sections.
     *
     * @param WidgetExtensionFormBuilder $builder
     */
    public function handle(WidgetExtensionFormBuilder $builder)
    {
        $widget        = $builder->getChildForm('widget');
        $configuration = $builder->getChildForm('configuration');

        $builder->setSections(
            [
                [
                    'fields' => function () use ($widget) {
                        return array_map(
                            function ($field) {
                                return 'widget_' . $field['field'];
                            },
                            $widget->getFields()
                        );
                    }
                ],
                [
                    'fields' => function () use ($configuration) {
                        return array_map(
                            function ($field) {
                                return 'configuration_' . $field['field'];
                            },
                            $configuration->getFields()
                        );
                    }
                ]
            ]
        );
    }
}
