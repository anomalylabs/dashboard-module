<?php namespace Anomaly\DashboardModule\Seeder;

use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\DashboardModule\Widget\Contract\WidgetRepositoryInterface;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;
use Anomaly\XmlFeedWidgetExtension\XmlFeedWidgetExtension;

/**
 * Class WidgetSeeder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\DashboardModule\Seeder
 */
class WidgetSeeder extends Seeder
{

    /**
     * The widget repository.
     *
     * @var WidgetRepositoryInterface
     */
    protected $widgets;

    /**
     * The configuration repository.
     *
     * @var ConfigurationRepositoryInterface
     */
    protected $configuration;

    /**
     * Create a new WidgetSeeder instance.
     *
     * @param $widgets
     */
    public function __construct(WidgetRepositoryInterface $widgets, ConfigurationRepositoryInterface $configuration)
    {
        $this->widgets       = $widgets;
        $this->configuration = $configuration;
    }

    /**
     * Run the seeder.
     */
    public function run()
    {
        $this->widgets->getModel()->flushCache();

        $widget = $this->widgets
            ->truncate()
            ->create(
                [
                    'en'        => [
                        'title'       => 'Recent News',
                        'description' => 'Recent news from http://pyrocms.com/'
                    ],
                    'dashboard' => 1, // Home
                    'extension' => 'anomaly.extension.xml_feed_widget'
                ]
            );

        $this->configuration->purge('anomaly.extension.xml_feed_widget');

        $this->configuration->create(
            [
                'scope' => $widget->getId(),
                'key'   => 'anomaly.extension.xml_feed_widget::url',
                'value' => 'http://www.pyrocms.com/posts/rss.xml'
            ]
        );

        $this->configuration->create(
            [
                'scope' => $widget->getId(),
                'key'   => 'anomaly.extension.xml_feed_widget::template',
                'value' => file_get_contents(
                    $this->container->make(XMLFeedWidgetExtension::class)->getPath('resources/stubs/template.stub')
                )
            ]
        );
    }
}
