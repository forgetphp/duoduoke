<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 下午5:56
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Account\WebApp;


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
    public function qrcodeUrlGen( $query = [ ] )
    {
        $query = array_merge( $query , [
            'type' => Type::QRCODE_URL_GEN,
            'goods_id_list' => json_encode($query['goods_id_list']),
        ] );

        return $this->httpPost( 'api/router' , $query );
    }
}