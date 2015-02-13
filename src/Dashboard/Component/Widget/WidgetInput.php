<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget;

use Anomaly\DashboardModule\Dashboard\DashboardBuilder;
use Anomaly\Streams\Platform\Support\Resolver;

/**
 * Class WidgetInput
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Widget
 */
class WidgetInput
{

    /**
     * The resolver utility.
     *
     * @var Resolver
     */
    protected $resolver;

    /**
     * The widget normalizer.
     *
     * @var WidgetNormalizer
     */
    protected $normalizer;

    /**
     * Create a new WidgetInput instance.
     *
     * @param Resolver         $resolver
     * @param WidgetNormalizer $normalizer
     */
    public function __construct(Resolver $resolver, WidgetNormalizer $normalizer)
    {
        $this->resolver   = $resolver;
        $this->normalizer = $normalizer;
    }

    /**
     * Read the widget input.
     *
     * @param DashboardBuilder $builder
     */
    public function read(DashboardBuilder $builder)
    {
        $this->resolveInput($builder);
        $this->normalizeInput($builder);
    }

    /**
     * Resolve the widget input.
     *
     * @param DashboardBuilder $builder
     */
    protected function resolveInput(DashboardBuilder $builder)
    {
        $builder->setWidgets($this->resolver->resolve($builder->getWidgets()));
    }

    /**
     * Normalize the widget input.
     *
     * @param DashboardBuilder $builder
     */
    protected function normalizeInput(DashboardBuilder $builder)
    {
        $builder->setWidgets($this->normalizer->normalize($builder->getWidgets()));
    }
}
