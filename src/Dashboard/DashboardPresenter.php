<?php namespace Anomaly\DashboardModule\Dashboard;

use Anomaly\Streams\Platform\Entry\EntryPresenter;

/**
 * Class DashboardPresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard
 */
class DashboardPresenter extends EntryPresenter
{

    /**
     * Return the edit link.
     *
     * @return string
     */
    public function editLink()
    {
        return app('html')->link(
            implode(
                '/',
                array_unique(
                    array_filter(
                        [
                            'admin',
                            $this->object->getStreamNamespace(),
                            'edit',
                            $this->object->getId()
                        ]
                    )
                )
            ),
            $this->object->{$this->object->getTitleName()}
        );
    }
}
