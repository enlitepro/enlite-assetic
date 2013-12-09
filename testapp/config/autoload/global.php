<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'assetic_configuration' => array(
        'default' => array(
            'assets' => array(),
            'options' => array(
                'mixin' => false
            ),
        ),
        'debug' => false,
        /*
         * Enable cache
         */
        'cacheEnabled' => true,
        /*
         * Cache dir
         */
        'cachePath' => realpath(__DIR__ . '/../../data/cache'),
        'webPath' => realpath('public/assets'),
        'baseUrl' => '/assets',
    ),
    'service_manager' => array(
//        'invokables' => array(
//            'AsseticCacheBuster' => 'AsseticBundle\CacheBuster\LastModifiedStrategy',
//            'AsseticCacheBuster' => 'EnliteAssetic\CacheBuster\Capistrano',
//        )
        'aliases' => array(
            'AsseticConfiguration' => 'EnliteAssetic\Configuration'
        ),
        'factories' => array(
            'EnliteAssetic\Configuration' => 'EnliteAssetic\ConfigurationFactory'
        )
    )
);
