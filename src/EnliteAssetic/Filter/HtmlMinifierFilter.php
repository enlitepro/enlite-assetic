<?php
/**
 *
 * User: Uladzimir Struts <Sysaninster@gmail.com>
 * Date: 04.09.2015
 * Time: 15:54
 */

namespace EnliteAssetic\Filter;


use Assetic\Asset\AssetInterface;
use Assetic\Exception\FilterException;
use Assetic\Filter\BaseNodeFilter;

class HtmlMinifierFilter extends BaseNodeFilter
{

    protected $htmlMinifierBin;
    protected $nodeBin;

    /**
     * The options
     *
     * @var array
     */
    protected $options = [
        'remove-comments',
        'collapse-whitespace',
        'conservative-collapse',
        'remove-redundant-attributes',
        'keep-closing-slash'
    ];

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @param string $htmlMinifierBin Path to htmlMinifier executable
     * @param string $nodeBin Path to node.js executable
     */
    public function __construct($htmlMinifierBin = '/usr/bin/html-minifier', $nodeBin = null)
    {
        $this->htmlMinifierBin = $htmlMinifierBin;
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
        $pb = $this->createProcessBuilder($this->nodeBin
            ? array($this->nodeBin, $this->htmlMinifierBin)
            : array($this->htmlMinifierBin));

        // input and output files
        $input = tempnam(sys_get_temp_dir(), 'input');
        $output = tempnam(sys_get_temp_dir(), 'output');

        file_put_contents($input, $asset->getContent());

        foreach ($this->getOptions() as $option) {
            $pb->add('--' . $option);
        }

        $pb->add('--output');
        $pb->add($output);
        $pb->add($input);

        $proc = $pb->getProcess();
        $code = $proc->run();
        unlink($input);

        if (0 !== $code) {
            if (file_exists($output)) {
                unlink($output);
            }

            throw FilterException::fromProcess($proc)->setInput($asset->getContent());
        }

        if (!file_exists($output)) {
            throw new \RuntimeException('Error creating output file.');
        }

        $asset->setContent(file_get_contents($output));

        unlink($output);
    }
}