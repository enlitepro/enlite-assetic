<?php
/**
 * @author Evgeny Shpilevsky <evgeny@shpilevsky.com>
 */

namespace EnliteAssetic\Filter;


use Assetic\Filter\FilterInterface;
use Assetic\Filter\UglifyCssFilter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

class UglifycssFilterFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface|ServiceManager $serviceLocator
     * @return FilterInterface
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $filter = new UglifyCssFilter('./node_modules/.bin/uglifycss');

        return $filter;
    }

} 