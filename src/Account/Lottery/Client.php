<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 下午5:56
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Account\Lottery;


use DuoDuoKe\Core\BaseClient;
use DuoDuoKe\Type;

/**
 * Class Client
 * @package DuoDuoKe\Account\Goods
 */
class Client extends BaseClient
{
    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface qrcodeUrlGen()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function newListGet( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type' => Type::LOTTERY_NEW_LIST_GET ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }

    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface urlGen()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function urlGen( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type' => Type::LOTTERY_URL_GEN ,
            'pid_list' => json_encode($query['pid_list']) ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }
}