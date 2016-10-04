<?php

namespace Georgios\ElastiClient;
use Elasticsearch\ClientBuilder;

/**
 * The ElastiClient factory class.
 *
 * @author Georgios Georgiadis <georgios@georgiadis.com>
 */
class ElastiClientFactory {

    /**
     * Make a new ElasticSearch client.
     *
     * @param array $config
     *
     * @return \Elasticsearch\Client
     */
    public function make(array $config)
    {
        $config = $this->getConfig($config);

        return $this->getClient($config);
    }

    /**
     * Get the configuration data.
     *
     * @param array $config
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    protected function getConfig(array $config)
    {
        return [
            'salt' => array_get($config, 'salt', ''),
            'length' => array_get($config, 'length', 0),
            'alphabet' => array_get($config, 'alphabet', ''),
        ];
    }

    /**
     * Get the ElasticSearch client.
     *
     * @param array $config
     *
     * @return \Elasticsearch\Client
     */
    protected function getClient(array $config)
    {
        return $client = ClientBuilder::create()           // Instantiate a new ClientBuilder
                         ->setHosts($config)      // Set the hosts
                         ->build();
    }
}