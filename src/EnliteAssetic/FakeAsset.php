<?php
/**
 * @author Evgeny Shpilevsky <evgeny@shpilevsky.com>
 */

namespace EnliteAssetic;


use Assetic\Asset\AssetInterface;
use Assetic\Asset\AssetReference;
use Assetic\Filter\FilterInterface;

class FakeAsset implements AssetInterface
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function ensureFilter(FilterInterface $filter)
    {
        throw new \RuntimeException('Sorry, looks like we can\'t find "' . $this->name . '" asset');
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        throw new \RuntimeException('Sorry, looks like we can\'t find "' . $this->name . '" asset');
    }

    /**
     * {@inheritdoc}
     */
    public function clearFilters()
    {
        throw new \RuntimeException('Sorry, looks like we can\'t find "' . $this->name . '" asset');
    }

    /**
     * {@inheritdoc}
     */
    public function load(FilterInterface $additionalFilter = null)
    {
        throw new \RuntimeException('Sorry, looks like we can\'t find "' . $this->name . '" asset');
    }

    /**
     * {@inheritdoc}
     */
    public function dump(FilterInterface $additionalFilter = null)
    {
        throw new \RuntimeException('Sorry, looks like we can\'t find "' . $this->name . '" asset');
    }

    /**
     * {@inheritdoc}
     */
    public function getContent()
    {
        throw new \RuntimeException('Sorry, looks like we can\'t find "' . $this->name . '" asset');
    }

    /**
     * {@inheritdoc}
     */
    public function setContent($content)
    {
        throw new \RuntimeException('Sorry, looks like we can\'t find "' . $this->name . '" asset');
    }

    /**
     * {@inheritdoc}
     */
    public function getSourceRoot()
    {
        return "";
    }

    /**
     * {@inheritdoc}
     */
    public function getSourcePath()
    {
        return 'fake/' . $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getTargetPath()
    {
        throw new \RuntimeException('Sorry, looks like we can\'t find "' . $this->name . '" asset');
    }

    /**
     * {@inheritdoc}
     */
    public function setTargetPath($targetPath)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getLastModified()
    {
        throw new \RuntimeException('Sorry, looks like we can\'t find "' . $this->name . '" asset');
    }

    /**
     * {@inheritdoc}
     */
    public function getVars()
    {
        throw new \RuntimeException('Sorry, looks like we can\'t find "' . $this->name . '" asset');
    }

    /**
     * {@inheritdoc}
     */
    public function setValues(array $values)
    {
        throw new \RuntimeException('Sorry, looks like we can\'t find "' . $this->name . '" asset');
    }

    /**
     * {@inheritdoc}
     */
    public function getValues()
    {
        throw new \RuntimeException('Sorry, looks like we can\'t find "' . $this->name . '" asset');
    }
}