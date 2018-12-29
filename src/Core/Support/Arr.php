<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 下午1:11
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Core\Support;


/**
 * Class Arr
 * @package DuoDuoKe\Core\Support
 */
class Arr
{
    /**
     * @method static array|mixed set()
     * @param array  $array
     * @param string $key
     * @param        $value
     *
     * @return array|mixed
     */
    public static function set( array &$array, string $key, $value)
    {
        $keys = explode('.',$key);

        while (count($keys) > 1){
            $key = array_shift($keys);

            if (!isset($array[$key]) || !is_array($array[$key])){
                $array[$key] = [];
            }

            $array = &$array[$key];
        }

        $array[array_shift($keys)] = $value;

        return $array;
    }

    /**
     * Get an item from an array using "dot" notation.
     *
     * @param \ArrayAccess|array $array
     * @param string             $key
     * @param mixed              $default
     *
     * @return mixed
     */
    public static function get(array $array, $key, $default = null)
    {
        if (is_null($key)) {
            return $array;
        }
        if (static::exists($array, $key)) {
            return $array[$key];
        }
        foreach (explode('.', $key) as $segment) {
            if (static::exists($array, $segment)) {
                $array = $array[$segment];
            } else {
                return $default;
            }
        }
        return $array;
    }

    /**
     * Determine if the given key exists in the provided array.
     *
     * @param \ArrayAccess|array $array
     * @param string|int         $key
     *
     * @return bool
     */
    public static function exists(array $array, $key)
    {
        return array_key_exists($key, $array);
    }

    /**
     * Remove one or many array items from a given array using "dot" notation.
     *
     * @param array        $array
     * @param array|string $keys
     */
    public static function forget(array &$array, $keys)
    {
        $original = &$array;
        $keys = (array) $keys;
        if (0 === count($keys)) {
            return;
        }
        foreach ($keys as $key) {
            // if the exact key exists in the top-level, remove it
            if (static::exists($array, $key)) {
                unset($array[$key]);
                continue;
            }
            $parts = explode('.', $key);
            // clean up before each pass
            $array = &$original;
            while (count($parts) > 1) {
                $part = array_shift($parts);
                if (isset($array[$part]) && is_array($array[$part])) {
                    $array = &$array[$part];
                } else {
                    continue 2;
                }
            }
            unset($array[array_shift($parts)]);
        }
    }
}