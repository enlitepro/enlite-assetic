<?php

namespace StdlibAssetic\Filter;

use Assetic\Filter\FilterInterface;
use Assetic\Filter\UglifyJs2Filter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

class UglifyFilterFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface|ServiceManager $serviceLocator
     * @return FilterInterface
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $filter = new UglifyJs2Filter('./node_modules/.bin/uglifyjs');
        $filter->setCompress(true);
        $filter->setMangle(true);

        return $filter;
    }


}
