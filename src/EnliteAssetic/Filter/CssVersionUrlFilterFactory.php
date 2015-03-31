<?php
/**
 * @author Vladimir Struts <Sysaninster@gmail.com>
 * @date 31.03.2015
 * @time 11:30
 * @license LICENSE.txt
 */

namespace EnliteAssetic\Filter;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CssVersionUrlFilterFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $filter = new CssVersionUrlFilter();
        return $filter;
    }
}