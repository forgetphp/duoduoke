<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 下午2:59
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Core\Providers;


use GuzzleHttp\Client;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class HttpClientServiceProvider implements ServiceProviderInterface
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
        $pimple['http_client'] = function ($app){
            return new Client($app['config']->get('http',[]));
        };
    }
}