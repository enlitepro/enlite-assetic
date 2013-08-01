<?php
/**
 * @author Evgeny Shpilevsky <evgeny@shpilevsky.com>
 */

namespace StdlibAssetic\Filter;

use Assetic\Asset\AssetInterface;
use Assetic\Exception\FilterException;
use Assetic\Filter\BaseNodeFilter;

class CssoFilter extends BaseNodeFilter
{

    /**
     * @var string
     */
    protected $cssoPath;

    /**
     * @param string $cssoPath     Absolute path to the csso executable
     * @param string $nodeBin      Absolute path to the folder containg node.js executable
     */
    public function __construct($cssoPath = '/usr/bin/csso', $nodeBin = null)
    {
        $this->cssoPath = $cssoPath;
        $this->nodeBin = $nodeBin;
    }

    /**
     * Filters an asset after it has been loaded.
     *
     * @param AssetInterface $asset An asset
     */
    public function filterLoad(AssetInterface $asset)
    {
    }

    /**
     * Filters an asset just before it's dumped.
     *
     * @param AssetInterface $asset An asset
     */
    public function filterDump(AssetInterface $asset)
    {
        $pb = $this->createProcessBuilder(
            $this->nodeBin
                ? array($this->nodeBin, $this->cssoPath)
                : array($this->cssoPath)
        );

        // input and output files
        $input = tempnam(sys_get_temp_dir(), 'input');
        $output = tempnam(sys_get_temp_dir(), 'output');

        file_put_contents($input, $asset->getContent());
        $pb->add('-i')->add($input);
        $pb->add('-o')->add($output);

        $process = $pb->getProcess();
        $code = $process->run();
        unlink($input);

        if (0 !== $code) {
            if (file_exists($output)) {
                unlink($output);
            }

            if (127 === $code) {
                throw new \RuntimeException('Path to node executable could not be resolved.');
            }

            throw FilterException::fromProcess($process)->setInput($asset->getContent());
        }

        if (!file_exists($output)) {
            throw new \RuntimeException('Error creating output file.');
        }

        $csso = file_get_contents($output);
        unlink($output);

        $asset->setContent($csso);
    }
}