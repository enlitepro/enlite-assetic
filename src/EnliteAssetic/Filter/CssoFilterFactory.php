<?php

namespace EnliteAssetic\Filter;

use Assetic\Filter\FilterInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

class CssoFilterFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface|ServiceManager $serviceLocator
     * @return FilterInterface
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $filter = new CssoFilter('./node_modules/.bin/csso');
        return $filter;
    }


}
