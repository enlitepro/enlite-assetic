<?php

namespace StdlibAssetic\Filter;

use Assetic\Filter\FilterInterface;
use Assetic\Filter\LessFilter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

class LessFilterFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface|ServiceManager $serviceLocator
     * @return FilterInterface
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $filter = new LessFilter(
            '/usr/bin/node',
            array(
                 getcwd() . "/node_modules/"
            )
        );

        return $filter;
    }


}
