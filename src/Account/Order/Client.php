<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 下午5:56
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Account\Order;


use DuoDuoKe\Core\BaseClient;
use DuoDuoKe\Type;

/**
 * Class Client
 * @package DuoDuoKe\Account\Order
 */
class Client extends BaseClient
{
    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface listIncrementGet()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function listIncrementGet( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type' => Type::ORDER_LIST_INCREMENT_GET ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }

    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface detailGet()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function detailGet( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type' => Type::ORDER_DETAIL_GET ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }

    public function colorIncrementGet( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type' => Type::COLOR_ORDER_INCREMENT_GET ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }
}