<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 下午5:55
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Account\Prom;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register( Container $pimple )
    {
        $pimple['prom'] = function ($app){
            return new Client($app);
        };
    }
}