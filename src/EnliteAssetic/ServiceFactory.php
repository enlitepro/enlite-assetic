<?php
/**
 * @author Evgeny Shpilevsky <evgeny@shpilevsky.com>
 */

namespace EnliteAssetic;


use AsseticBundle\Configuration;
use Zend\Cache\Storage\Adapter\Filesystem;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ServiceFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var Configuration $asseticConfig */
        $asseticConfig = $serviceLocator->get('AsseticConfiguration');
        if ($asseticConfig->detectBaseUrl()) {
            /** @var $request \Zend\Http\PhpEnvironment\Request */
            $request = $serviceLocator->get('Request');
            if (method_exists($request, 'getBaseUrl')) {
                $asseticConfig->setBaseUrl($request->getBaseUrl());
            }
        }

        $cache = new Filesystem(['cacheDir' => 'data/cache']);

        $asseticService = new Service($asseticConfig, $cache);
        $asseticService->setAssetManager($serviceLocator->get('AsseticAssetManager'));
        $asseticService->setAssetWriter($serviceLocator->get('AsseticAssetWriter'));
        $asseticService->setFilterManager($serviceLocator->get('AsseticFilterManager'));

        // Cache buster is not mandatory
        if ($serviceLocator->has('AsseticCacheBuster')) {
            $asseticService->setCacheBusterStrategy($serviceLocator->get('AsseticCacheBuster'));
        }

        return $asseticService;
    }
}