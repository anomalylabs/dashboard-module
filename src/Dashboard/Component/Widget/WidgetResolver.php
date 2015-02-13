<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget;

use Anomaly\DashboardModule\Dashboard\DashboardBuilder;
use Anomaly\Streams\Platform\Support\Resolver;

/**
 * Class WidgetResolver
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Widget
 */
class WidgetResolver
{

    /**
     * The resolver utility.
     *
     * @var Resolver
     */
    protected $resolver;

    /**
     * Create a new WidgetResolver instance.
     *
     * @param Resolver $resolver
     */
    public function __construct(Resolver $resolver)
    {
        $this->resolver = $resolver;
    }

    /**
     * Resolve the dashboard widgets.
     *
     * @param DashboardBuilder $builder
     */
    public function resolve(DashboardBuilder $builder)
    {
        $this->resolver->resolve($builder->getWidgets(), compact('builder'));
    }
}
