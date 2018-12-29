<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 下午12:57
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Core\Providers;


use DuoDuoKe\Core\Config;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ConfigServerProvider implements ServiceProviderInterface
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
        $pimple['config'] = function ($app){
            return new Config($app->getConfig());
        };
    }
}