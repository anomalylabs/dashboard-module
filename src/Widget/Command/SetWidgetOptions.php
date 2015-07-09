<?php namespace Anomaly\DashboardModule\Widget\Command;

use Anomaly\DashboardModule\Widget\WidgetExtension;
use Anomaly\Streams\Platform\Support\Evaluator;
use Anomaly\Streams\Platform\Support\Resolver;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetDefaultTitleOption
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Widget\Command
 */
class SetWidgetOptions implements SelfHandling
{

    /**
     * The widget extension.
     *
     * @var WidgetExtension
     */
    protected $extension;

    /**
     * Create a BuildWidget instance.
     *
     * @param WidgetExtension $extension
     */
    public function __construct(WidgetExtension $extension)
    {
        $this->extension = $extension;
    }

    /**
     * Handle the command.
     *
     * @param Resolver  $resolver
     * @param Evaluator $evaluator
     */
    public function handle(Resolver $resolver, Evaluator $evaluator)
    {
        $arguments = ['extension' => $this->extension];

        $widget = $this->extension->getWidget();

        $options = $widget->getOptions();
        $options = array_merge($options->all(), $this->extension->getOptions());

        $options = $resolver->resolve($options, $arguments);
        $options = $evaluator->evaluate($options, $arguments);

        foreach ($options as $key => $value) {
            $widget->setOption($key, $value);
        }
    }
}
