<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report;

use Anomaly\DashboardModule\Dashboard\DashboardBuilder;
use Anomaly\Streams\Platform\Support\Resolver;

/**
 * Class ReportInput
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report
 */
class ReportInput
{

    /**
     * The resolver utility.
     *
     * @var Resolver
     */
    protected $resolver;

    /**
     * The report normalizer.
     *
     * @var ReportNormalizer
     */
    protected $normalizer;

    /**
     * Create a new ReportInput instance.
     *
     * @param Resolver         $resolver
     * @param ReportNormalizer $normalizer
     */
    public function __construct(Resolver $resolver, ReportNormalizer $normalizer)
    {
        $this->resolver   = $resolver;
        $this->normalizer = $normalizer;
    }

    /**
     * Read the report input.
     *
     * @param DashboardBuilder $builder
     */
    public function read(DashboardBuilder $builder)
    {
        $this->resolveInput($builder);
        $this->normalizeInput($builder);
    }

    /**
     * Resolve the report input.
     *
     * @param DashboardBuilder $builder
     */
    protected function resolveInput(DashboardBuilder $builder)
    {
        $builder->setReports($this->resolver->resolve($builder->getReports()));
    }

    /**
     * Normalize the report input.
     *
     * @param DashboardBuilder $builder
     */
    protected function normalizeInput(DashboardBuilder $builder)
    {
        $builder->setReports($this->normalizer->normalize($builder->getReports()));
    }
}
