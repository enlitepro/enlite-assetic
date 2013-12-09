<?php
/**
 * @author Evgeny Shpilevsky <evgeny@shpilevsky.com>
 */

namespace EnliteAssetic\CacheBuster;


use Assetic\Asset\AssetInterface;
use Assetic\Factory\Worker\WorkerInterface;

class Capistrano implements WorkerInterface
{
    /**
     * @var string
     */
    private $revision;

    /**
     * Processes an asset.
     *
     * @param AssetInterface $asset An asset
     *
     * @return AssetInterface|null May optionally return a replacement asset
     */
    public function process(AssetInterface $asset)
    {
        $path = $asset->getTargetPath();
        $ext = pathinfo($path, PATHINFO_EXTENSION);

        $revision = $this->getRevision();
        if (null !== $revision) {
            $path = substr_replace(
                $path,
                "$revision.$ext",
                -1 * strlen($ext)
            );
            $asset->setTargetPath($path);
        }
    }

    /**
     * @return string
     */
    private function getRevision()
    {
        return \EnliteAssetic\Capistrano::getShortRevision();
    }
}