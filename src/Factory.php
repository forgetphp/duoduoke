<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 上午10:09
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe;
use DuoDuoKe\Core\Support\Str;


/**
 * Class Factory
 * @package DuoDuoKe
 *
 * @method static \DuoDuoKe\Account\Application account(array $config)
 */
class Factory
{
    /**
     * @method static __callStatic()
     * @return mixed
     *
     * @param $name
     * @param $arguments
     */
    public static function __callStatic( $name , $arguments )
    {
        return self::make($name,...$arguments);
    }

    /**
     * Dynamically pass methods to the application.
     * @method static make()
     * @return mixed
     *
     * @param  string $name
     * @param  array  $config
     */
    public static function make( $name , array $config)
    {
        $namespace = Str::studly($name);

        $application = "\\DuoDuoKe\\{$namespace}\\Application";

        return new $application($config);
    }

}