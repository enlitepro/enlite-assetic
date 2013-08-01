<?php

namespace StdlibAssetic\Filter;

use Assetic\Filter\CoffeeScriptFilter;
use Assetic\Filter\FilterInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

class CoffeeFilterFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface|ServiceManager $serviceLocator
     * @return FilterInterface
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $filter = new CoffeeScriptFilter('./node_modules/.bin/coffee');

        return $filter;
    }


}
