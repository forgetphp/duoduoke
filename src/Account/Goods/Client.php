<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 下午5:56
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Account\Goods;


use DuoDuoKe\Core\BaseClient;
use DuoDuoKe\Type;

/**
 * Class Client
 * @package DuoDuoKe\Account\Goods
 */
class Client extends BaseClient
{
    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface search()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function search( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type' => Type::GOODS_SEARCH ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }


    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface detail()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function detail( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type'          => Type::GOODS_DETAIL ,
            'goods_id_list' => "[" . implode( "," , $query['goods_id_list'] ) . "]" ,

        ] );

        return $this->httpPost( 'api/router' , $query );
    }

    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface promotionUrlGenerate()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function promotionUrlGenerate( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type'          => Type::GOODS_PROMOTION_URL_GENERATE ,
            'goods_id_list' => "[" . implode( "," , $query['goods_id_list'] ) . "]" ,

        ] );

        return $this->httpPost( 'api/router' , $query );
    }

    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface direct()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function direct( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type' => Type::DIRECT_GOODS_QUERY ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }


    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface zsUnitUrlGen()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function zsUnitUrlGen( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type' => Type::GOODS_ZS_UNIT_URL_GEN ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }

    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface zsUnitGoodsQuery()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function zsUnitGoodsQuery( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type' => Type::ZS_UNIT_GOODS_QUERY ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }

    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface basicInfoGet()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function basicInfoGet( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type' => Type::GOODS_BASIC_INFO_GET ,
            'goods_id_list' => json_encode($query['goods_id_list']) ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }

    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface recommendGet()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function recommendGet($query = [])
    {
        $query = array_merge( $query , [
            'type' => Type::GOODS_RECOMMENT_GET ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }

    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface topGoodsListQuery()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function topGoodsListQuery($query = [])
    {
        $query = array_merge( $query , [
            'type' => Type::TOP_GOODS_LIST_QUERY ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }
}