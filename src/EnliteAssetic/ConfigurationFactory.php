<?php
/**
 * @author Evgeny Shpilevsky <evgeny@shpilevsky.com>
 */

namespace EnliteAssetic;


use AsseticBundle\Configuration;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ConfigurationFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        $config = $config['assetic_configuration'];

        // if not debug, try load from cache
        if (!$config['debug'] && isset($config['cachePath'])) {
            $path = $config['cachePath'] . "/assetic.config.php";

            if (file_exists($path)) {
                return unserialize(file_get_contents($path));
            } else {
                $config = new Configuration($this->processConfig($config));
                file_put_contents($path, serialize($config));

                return $config;
            }
        } else {
            return new Configuration($this->processConfig($config));
        }
    }

    /**
     * @param array $config
     * @return array
     */
    private function processConfig(array $config)
    {
        if (isset($config['modules'])) {
            foreach ($config['modules'] as $name => $module) {
                $config['modules'][$name] = $this->processModuleConfig($module);
            }
        }

        return $config;
    }

    /**
     * @param array $config
     * @return array
     */
    private function processModuleConfig(array $config)
    {
        if (isset($config['collections'])) {
            foreach ($config['collections'] as $name => $collection) {
                $config['collections'][$name] = $this->processCollectionConfig($collection);
            }
        }

        return $config;
    }

    /**
     * @param array $config
     * @return array
     */
    private function processCollectionConfig(array $config)
    {
        if (isset($config['options']['output'])) {
            $path = $config['options']['output'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);

            $revision = Capistrano::getShortRevision();
            if (null !== $revision) {
                $path = substr_replace(
                    $path,
                    "$revision.$ext",
                    -1 * strlen($ext)
                );
                $config['options']['output'] = $path;
            }
        }

        return $config;
    }

}