<?php
/**
 * @author Vladimir Struts <Sysaninster@gmail.com>
 * @date 31.03.2015
 * @time 11:00
 * @license LICENSE.txt
 */

namespace EnliteAssetic\Filter;


use Assetic\Asset\AssetInterface;
use Assetic\Filter\BaseCssFilter;
use EnliteAssetic\Capistrano;

class CssVersionUrlFilter extends  BaseCssFilter
{

    /**
     * The convertAbsoluteUrl
     *
     * @var bool
     */
    protected $convertAbsoluteUrl = false;

    /**
     * The versionArgumentName
     *
     * @var string
     */
    protected $versionArgumentName = 'v';

    /**
     * @return boolean
     */
    public function isConvertAbsoluteUrl()
    {
        return $this->convertAbsoluteUrl;
    }

    /**
     * @param boolean $convertAbsoluteUrl
     */
    public function setConvertAbsoluteUrl($convertAbsoluteUrl)
    {
        $this->convertAbsoluteUrl = $convertAbsoluteUrl;
    }

    /**
     * @return string
     */
    public function getVersionArgumentName()
    {
        return $this->versionArgumentName;
    }

    /**
     * @param string $versionArgumentName
     */
    public function setVersionArgumentName($versionArgumentName)
    {
        $this->versionArgumentName = $versionArgumentName;
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
        $self = $this;
        $content = $this->filterUrls($asset->getContent(), function($matches) use ($self) {
            $url = $matches['url'];
            if ($self->isAbsoluteUrl($url) && !$self->isConvertAbsoluteUrl()) {
                return $matches[0];
            }
            $argumentSeparator = '?';
            if (mb_strpos($url, '?') !== false) {
                $argumentSeparator = '&';
            }
            $url .= $argumentSeparator . $self->getVersionArgumentName() . '=' . urlencode($self->getVersion());
            return 'url("' . $url . '")';
        });
        $asset->setContent($content);
    }

    /**
     * @param string $url
     * @return bool
     */
    protected function isAbsoluteUrl($url)
    {
        return mb_strpos($url, '://') !== false;
    }

    /**
     * @return string
     */
    protected function getVersion()
    {
        return Capistrano::getShortRevision();
    }
}