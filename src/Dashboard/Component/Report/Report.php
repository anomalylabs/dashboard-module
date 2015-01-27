<?php namespace Anomaly\DashboardModule\Dashboard\Component\Report;

use Illuminate\Support\Collection;

/**
 * Class Report
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Dashboard\Component\Report
 */
class Report
{

    /**
     * The report content.
     *
     * @var null|string
     */
    public $content = null;

    /**
     * The data collection.
     *
     * @var Collection
     */
    protected $data;

    /**
     * The options collection.
     *
     * @var Collection
     */
    protected $options;

    /**
     * @param Collection $data
     * @param Collection $options
     */
    public function __construct(Collection $data, Collection $options)
    {
        $this->data    = $data;
        $this->options = $options;
    }

    /**
     * Get the data.
     *
     * @return Collection
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Add to the data collection.
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function addData($key, $value)
    {
        $this->data->put($key, $value);

        return $this;
    }

    /**
     * Get the options.
     *
     * @return Collection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set an option.
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function setOption($key, $value)
    {
        $this->options->put($key, $value);

        return $this;
    }

    /**
     * Get an option value.
     *
     * @param $key
     * @param $default
     * @return mixed
     */
    public function getOption($key, $default)
    {
        return $this->options->get($key, $default);
    }

    /**
     * Get the content.
     *
     * @return null|string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the content.
     *
     * @param null|string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}
