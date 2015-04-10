<?php
/**
 * @author Vladimir Struts <Sysaninster@gmail.com>
 * @date 10.04.2015
 * @time 16:31
 * @license LICENSE.txt
 */

namespace EnliteAssetic\View;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AssetsFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $asset = new Asset($serviceLocator);
        return $asset;
    }
}