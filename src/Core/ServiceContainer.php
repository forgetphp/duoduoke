<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 下午12:39
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Core;


use DuoDuoKe\Core\Providers\ConfigServerProvider;
use DuoDuoKe\Core\Providers\HttpClientServiceProvider;
use DuoDuoKe\Core\Providers\RequestServiceProvider;
use Pimple\Container;

class ServiceContainer extends Container
{
    protected $id;

    protected $providers = [];

    protected $defaultConfig = [];

    protected $userConfig = [];

    /**
     * ServiceContainer constructor.
     *
     * @param $id
     */
    public function __construct(array $config = [], array  $prepends = [], string $id = null )
    {
       $this->registerProviders($this->getProviders());

        parent::__construct($prepends);

        $this->userConfig = $config;

        $this->id = $id;

//        $this->aggregate();
    }


    /**
     * Return all providers.
     *
     * @return array
     */
    public function getProviders()
    {
        return array_merge([
            ConfigServerProvider::class,
            RequestServiceProvider::class,
            HttpClientServiceProvider::class,
        ], $this->providers);
    }

    /**
     * @param array $providers
     */
    public function registerProviders(array $providers)
    {
        foreach ($providers as $provider) {
            parent::register(new $provider());
        }
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        $base = [
            // http://docs.guzzlephp.org/en/stable/request-options.html
            'http' => [
                'timeout' => 30.0,
                'base_uri' => 'http://gw-api.pinduoduo.com/',
            ],
        ];

        return array_replace_recursive($base, $this->defaultConfig, $this->userConfig);
    }

    public function __get( $id )
    {
        return $this->offsetGet($id);
    }
}