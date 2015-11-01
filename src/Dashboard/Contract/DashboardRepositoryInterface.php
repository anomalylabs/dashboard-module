<?php namespace Anomaly\DashboardModule\Dashboard\Contract;

use Anomaly\DashboardModule\Dashboard\DashboardCollection;
use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface DashboardRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Contract
 */
interface DashboardRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Return only allowed dashboards.
     *
     * @return DashboardCollection
     */
    public function allowed();

    /**
     * Find a dashboard by it's slug.
     *
     * @param $slug
     * @return null|DashboardInterface
     */
    public function findBySlug($slug);
}
