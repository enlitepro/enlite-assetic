<?php
/**
 * @author Evgeny Shpilevsky <evgeny@shpilevsky.com>
 */

namespace EnliteAssetic;


class Capistrano
{
    /**
     * @var string
     */
    private static $revision;

    /**
     * @return string
     */
    public static function getRevision()
    {
        if (null === self::$revision) {
            $dir = getcwd();
            while ($dir && $dir !== '/') {
                if (file_exists($dir . "/REVISION")) {
                    self::$revision = file_get_contents($dir . "/REVISION");
                    break;
                }
                $dir = dirname($dir);
            }
        }

        return self::$revision;
    }

    /**
     * @return string
     */
    public static function getShortRevision()
    {
        return substr(self::getRevision(), 0, 8);
    }

}