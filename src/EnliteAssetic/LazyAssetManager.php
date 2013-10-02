<?php
/**
 * @author Evgeny Shpilevsky <evgeny@shpilevsky.com>
 */

namespace EnliteAssetic;


use Assetic\AssetManager;

class LazyAssetManager extends AssetManager
{

    /**
     * {@inheritdoc}
     */
    public function get($name)
    {
        try {
            return parent::get($name);
        }
        catch(\InvalidArgumentException $e) {
            return new FakeAsset($name);
        }
    }

}