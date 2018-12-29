<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 上午10:26
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Core\Support;


/**
 * Class Str
 * @package DuoDuoKe\Core
 */
class Str
{
    /**
     * the cache of studly-cased words.
     * @var array
     */
    protected static $studlyCache = [];

    /**
     * Convert a value to studly caps case.
     *
     * @method static array|mixed studly()
     *
     * @param $value
     *
     * @return array|mixed
     */
    public static function studly($value)
    {
        $key = $value;

        if (isset(static::$studlyCache[$key])){
            return static::$studlyCache;
        }

        $value = ucwords(str_replace(['-','_'],' ',$value));

        return static::$studlyCache[$key] = str_replace(' ', '', $value);
    }
}