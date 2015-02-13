<?php namespace Anomaly\DashboardModule\Dashboard\Component\Widget;

use Anomaly\DashboardModule\Dashboard\DashboardBuilder;

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
     * @var WidgetResolver
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
     * @param WidgetResolver   $resolver
     * @param WidgetNormalizer $normalizer
     */
    public function __construct(WidgetResolver $resolver, WidgetNormalizer $normalizer)
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
        $this->resolver->resolve($builder);
        $this->normalizer->normalize($builder);
    }
}
