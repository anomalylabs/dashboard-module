<?php namespace Anomaly\DashboardModule\Dashboard\Command;

use Anomaly\DashboardModule\Dashboard\DashboardBuilder;
use Anomaly\Streams\Platform\Support\Evaluator;
use Anomaly\Streams\Platform\Support\Resolver;
use Illuminate\Contracts\Bus\SelfHandling;

class SetDashboardOptions implements SelfHandling
{

    protected $builder;

    public function __construct(DashboardBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param Resolver  $resolver
     * @param Evaluator $evaluator
     */
    public function handle(Resolver $resolver, Evaluator $evaluator)
    {
        $arguments = ['builder' => $this->builder];

        $dashboard = $this->builder->getDashboard();

        $options = $this->builder->getOptions();

        $options = $resolver->resolve($options, $arguments);
        $options = $evaluator->evaluate($options, $arguments);

        foreach ($options as $key => $value) {
            $dashboard->setOption($key, $value);
        }
    }
}
