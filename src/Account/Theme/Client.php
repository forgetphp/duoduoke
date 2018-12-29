<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 下午5:56
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Account\Theme;


use DuoDuoKe\Core\BaseClient;
use DuoDuoKe\Type;

/**
 * Class Client
 * @package DuoDuoKe\Account\Goods
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
            'type' => Type::THEME_LIST_GET ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }

    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface goodsSearch()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function goodsSearch( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type' => Type::THEME_GOODS_SEARCH ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }

    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface promUrlGenerate()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function promUrlGenerate( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type'          => Type::THEME_PROM_URL_GENERATE ,
            'theme_id_list' => json_encode( $query['theme_id_list'] ) ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }


}