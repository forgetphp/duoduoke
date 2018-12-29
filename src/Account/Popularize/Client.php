<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 下午3:34
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Account\Popularize;


use DuoDuoKe\Core\BaseClient;
use DuoDuoKe\Type;

/**
 * Class Client
 * @package DuoDuoKe\Popularize
 */
class Client extends BaseClient
{
    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface list()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function list( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type' => Type::GOODS_PID_QUERY,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }

    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface create()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function create( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type'           => Type::GOODS_PID_GENERATE ,
            'number'         => count( $query ) ,
            'p_id_name_list' => json_encode($query),
        ] );

        return $this->httpPost( 'api/router' , $query );
    }
}