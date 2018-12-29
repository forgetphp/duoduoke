<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 下午3:39
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Core;


use DuoDuoKe\Core\Contracts\Arrayable;
use DuoDuoKe\Core\Http\Response;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\ResponseInterface;

/**
 * Class BaseClient
 * @package DuoDuoKe\Core
 */
class BaseClient
{
    /**
     * @var ServiceContainer
     */
    protected $app;

    /**
     * @var
     */
    protected $baseUri;

    /**
     * @var \GuzzleHttp\HandlerStack
     */
    protected $handlerStack;

    /**
     * @var \GuzzleHttp\ClientInterface
     */
    protected $httpClient;

    /**
     * @var array
     */
    protected static $defaults = [
        'curl' => [
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
        ],
    ];

    /**
     * BaseClient constructor.
     *
     * @param $app
     */
    public function __construct(ServiceContainer $app  )
    {
        $this->app         = $app;
    }

    /**
     * @method array|Response|object|ResponseInterface httpGet()
     * @param string $url
     * @param array  $query
     *
     * @return array|Response|object|ResponseInterface
     */
    public function httpGet( string $url, $query = [])
    {
        return $this->request($url, 'GET', ['query' => $query]);
    }

    /**
     * @method array|Response|object|ResponseInterface httpPost()
     * @return array|Response|object|ResponseInterface
     *
     * @param string $url
     * @param array  $query
     *
     */
    public function httpPost( string $url, $query = [])
    {
        return $this->request($url, 'POST', ['query' => $query]);
    }

    /**
     * @method array|Response|object|ResponseInterface request()
     * @param string $url
     * @param string $method
     * @param array  $options
     * @param bool   $returnRaw
     *
     * @return array|Response|object|ResponseInterface
     */
    private function request( string $url , string $method = 'GET' , array $options = [] , $returnRaw = false)
    {

        $options = array_merge(self::$defaults, $options, ['handler' => $this->getHandlerStack()]);

        $options = $this->fixJsonIssue($options);

        $options['base_uri'] = $this->app->getConfig()['http']['base_uri'];

        $options = $this->applyCommonParams($options);

        if (property_exists($this, 'baseUri') && !is_null($this->baseUri)) {
            $options['base_uri'] = $this->baseUri;
        }

        $response = $this->getHttpClient()->request($method, $url, $options);
        $response->getBody()->rewind();

        return $returnRaw ? $response : $this->castResponseToType($response, $this->app->config->get('response_type'));
    }

    private function applyCommonParams($options=[])
    {
        $options['query']['timestamp'] = time();
        $options['query']['client_id'] = $this->app->config->get('client_id');

         $options['query']['sign'] = $this->buildSign($options);

        return $options;
    }

    private function buildSign($options=[])
    {
        $secret = $this->app->config->get('client_secret');

        $query = $options['query'];


        ksort($query);

        $tempStr = '';
        foreach ( $query as $key => $item ) {
            $temp = $key.$item ;
            $tempStr .= $temp;
        }


        $signStr = $secret.$tempStr.$secret;

        return strtoupper(md5($signStr));
    }

    /**
     * @method array|Response|Support\Collection|object|ResponseInterface castResponseToType()
     * @param ResponseInterface $response
     * @param null              $type
     *
     * @return array|Response|Support\Collection|object|ResponseInterface
     * @throws \Exception
     */
    protected function castResponseToType( ResponseInterface $response, $type = null)
    {
        $response = Response::buildFromPsrResponse($response);
        $response->getBody()->rewind();

        switch ($type ?? 'array') {
            case 'collection':
                return $response->toCollection();
            case 'array':
                return $response->toArray();
            case 'object':
                return $response->toObject();
            case 'raw':
                return $response;
            default:
                if (!is_subclass_of($type, Arrayable::class)) {
                    throw new \Exception(sprintf(
                        'Config key "response_type" classname must be an instanceof %s',
                        Arrayable::class
                    ));
                }

                return new $type($response);
        }
    }


    /**
     * Return GuzzleHttp\ClientInterface instance.
     *
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        if (!($this->httpClient instanceof ClientInterface)) {
            $this->httpClient = $this->app['http_client'] ?? new Client();
        }

        return $this->httpClient;
    }

    /**
     * Build a handler stack.
     *
     * @return \GuzzleHttp\HandlerStack
     */
    public function getHandlerStack(): HandlerStack
    {
        if ($this->handlerStack) {
            return $this->handlerStack;
        }

        $this->handlerStack = HandlerStack::create();

        return $this->handlerStack;
    }

    /**
     * @param array $options
     *
     * @return array
     */
    protected function fixJsonIssue(array $options): array
    {
        if (isset($options['json']) && is_array($options['json'])) {
            $options['headers'] = array_merge($options['headers'] ?? [], ['Content-Type' => 'application/json']);

            if (empty($options['json'])) {
                $options['body'] = \GuzzleHttp\json_encode($options['json'], JSON_FORCE_OBJECT);
            } else {
                $options['body'] = \GuzzleHttp\json_encode($options['json'], JSON_UNESCAPED_UNICODE);
            }

            unset($options['json']);
        }

        return $options;
    }


}