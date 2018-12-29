<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 下午12:22
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Account;

use DuoDuoKe\Core\ServiceContainer;

/**
 * Class Application
 * @property \DuoDuoKe\Account\Popularize\Client $popularize
 * @property \DuoDuoKe\Account\Goods\Client      $goods
 * @property \DuoDuoKe\Account\Order\Client      $order
 * @property \DuoDuoKe\Account\Prom\Client       $prom
 * @property \DuoDuoKe\Account\Theme\Client      $theme
 * @property \DuoDuoKe\Account\WebApp\Client     $webapp
 * @property \DuoDuoKe\Account\Mall\Client       $mall
 * @property \DuoDuoKe\Account\Lottery\Client    $lottery
 * @property \DuoDuoKe\Account\Resource\Client   $resource
 * @property \DuoDuoKe\Account\Merchant\Client   $merchant
 * @package DuoDuoKe\Account
 */
class Application extends ServiceContainer
{
    /**
     *
     * @var array
     */
    protected $providers = [
        Popularize\ServiceProvider::class ,
        Goods\ServiceProvider::class ,
        Order\ServiceProvider::class ,
        Prom\ServiceProvider::class ,
        Theme\ServiceProvider::class ,
        WebApp\ServiceProvider::class ,
        Mall\ServiceProvider::class ,
        Lottery\ServiceProvider::class ,
        Resource\ServiceProvider::class ,
        Merchant\ServiceProvider::class ,
    ];
}