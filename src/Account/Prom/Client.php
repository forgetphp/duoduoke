<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 下午5:56
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Account\Prom;


use DuoDuoKe\Core\BaseClient;
use DuoDuoKe\Type;

/**
 * Class Client
 * @package DuoDuoKe\Account\Goods
 */
class Client extends BaseClient
{
    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface rpPromUrlGenerate()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function rpPromUrlGenerate( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type'      => Type::RP_PROM_URL_GENERATE ,
            'p_id_list' => json_encode( $query['p_id_list'] ) ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }

    /**
     * @method array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface cmsPromUrlGenerate()
     * @param array $query
     *
     * @return array|\DuoDuoKe\Core\Http\Response|object|\Psr\Http\Message\ResponseInterface
     */
    public function cmsPromUrlGenerate( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type'      => Type::CMS_PROM_URL_GENERATE ,
            'p_id_list' => json_encode( $query['p_id_list'] ) ,
        ] );

        return $this->httpPost( 'api/router' , $query );
    }

}