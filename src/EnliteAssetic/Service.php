<?php
/**
 * @author Evgeny Shpilevsky <evgeny@shpilevsky.com>
 */

namespace EnliteAssetic;


use Assetic\AssetManager;
use AsseticBundle\Configuration;
use AsseticBundle\Service as AsseticService;
use Zend\Cache\Storage\Adapter\AbstractAdapter;

class Service extends AsseticService
{

    /**
     * @var AbstractAdapter
     */
    private $cacheAdapter;

    /**
     * The built
     *
     * @var bool
     */
    private $built = false;

    /**
     * @param Configuration $configuration
     * @param AbstractAdapter $cache
     */
    public function __construct(Configuration $configuration, AbstractAdapter $cache)
    {
        $this->configuration = $configuration;
        $this->cacheAdapter = $cache;
    }

    /**
     * @inheritdoc
     */
    public function build()
    {
        if ($this->built) {
            return;
        }
        $key = 'assets-manager';
        if ($this->cacheAdapter->hasItem($key)) {
            $data = $this->cacheAdapter->getItem($key);
            $assetManager = unserialize($data);
            if ($assetManager instanceof AssetManager) {
                $this->setAssetManager($assetManager);
                return;
            }
        }

        parent::build();
        $this->cacheAdapter->setItem($key, serialize($this->getAssetManager()));
        $this->built = true;
    }

} 