<?php
/**
 * @author Vladimir Struts <Sysaninster@gmail.com>
 * @date 10.04.2015
 * @time 16:12
 * @license LICENSE.txt
 */

namespace EnliteAssetic\View;


use AsseticBundle\View\Helper\Asset as WAsset;
use Zend\ServiceManager\ServiceLocatorInterface;

class Asset extends WAsset
{
    public function __construct(ServiceLocatorInterface $serviceLocator)
    {
        $this->service = $serviceLocator->getServiceLocator()->get('EnliteAssetic\Service');
        $this->service->build();

        $this->baseUrl = $this->service->getConfiguration()->getBaseUrl();
        $this->basePath = $this->service->getConfiguration()->getBasePath();
    }


}