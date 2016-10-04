<?php

namespace Georgios\ElastiClient\Facades;
/**
 * This is the ElastiClient facade class.
 *
 * @author Georgios Georgiadis <georgios@georgiadis.co.uk>
 */
class ElastiClient {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'elasticlient';
    }
}