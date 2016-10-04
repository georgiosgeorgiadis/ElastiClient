<?php

namespace Georgios\ElastiClient;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

/**
* The ElastiClient manager class.
*
* @author Georgios Georgiadis <georgios@georgiadis.co.uk>
*/
class ElastiClientManager extends AbstractManager {

    /**
     * The factory instance.
     *
     * @var \Georgios\ElastiClient\ElastiClientFactory
     */
    private $factory;

    /**
     * Create a new ElastiClient manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \Georgios\ElastiClient\ElastiClientFactory $factory
     *
     * @return void
     */
    public function __construct(Repository $config, ElastiClientFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    /**
     * Create the connection instance.
     *
     * @param array $config
     *
     * @return mixed
     */
    protected function createConnection(array $config)
    {
        return $this->factory->make($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName()
    {
        return 'elasticlient';
    }

}