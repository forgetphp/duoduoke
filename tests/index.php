<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/28
 * Time: 下午3:36
 */
include_once '../vendor/autoload.php';
use \DuoDuoKe\Factory;

$config = include_once './config.php';

//$config = [
//    'client_id'=>'',
//    'client_secret'=>'',
//    // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
//    'response_type' => 'array',
//];

$app = Factory::account($config);

echo "<pre>";

//推广位查询
$result = $app->popularize->list([
    'page'=>1,
    'page_size'=>20
]);

//推广位创建 一次创建一个。不然容易出错
//$result = $app->popularize->create(['test3']);

//搜索商品
//$result = $app->goods->search([
//    'keyword'=>'手机'
//]);

//商品详情
//$result = $app->goods->detail([
//    'goods_id_list'=>[259579651]
//]);


//8254052_47650851 promotionUrlGenerate
//生成普通商品推广链接
//$result = $app->goods->promotionUrlGenerate([
//    'goods_id_list'=>[259579651],
//    'p_id'=>'8254052_47650851',
//    'generate_we_app'=>'true'
//]);

//按照时间段获取授权多多客下面所有多多客的推广订单信息
//$result = $app->order->listIncrementGet([
//    'start_update_time'=>time() - 86400,
//    'end_update_time'=>time(),
//]);

//生成红包推广链接接口
//$result = $app->prom->rpPromUrlGenerate([
//    'generate_short_url'=>'true',
//    'p_id_list'=>['8254052_47650851'],
//    'generate_weapp_webview'=>'true',
//    'we_app_web_view_short_url'=>'true',
//    'we_app_web_wiew_url'=>'true',
//    'generate_we_app'=>'true',
//]);

//生成商城推广链接接口
//$result = $app->prom->cmsPromUrlGenerate([
//    'generate_short_url'=>'true',
//    'p_id_list'=>['8254052_47650851'],
//    'generate_mobile'=>'true',
//    'generate_weapp_webview'=>'true',
//    'we_app_web_view_short_url'=>'true',
//    'we_app_web_wiew_url'=>'true',
//    'generate_we_app'=>'true',
//    'we_app_web_view_url'=>'true',
//]);

//查询多多进宝主题列表 4092
//$result = $app->theme->list([
//    'page'=>'1',
//    'page_size'=>20
//]);


//多多进宝主题商品查询
//$result = $app->theme->goodsSearch([
//    'theme_id'=>'4075',
//]);

//多多进宝主题活动推广链接生成
//$result = $app->theme->promUrlGenerate([
//    'pid'=>'8254052_47650851',
//    'theme_id_list'=>[
//        4075
//    ],
//    'generate_short_url'=>'true',
//    'generate_mobile'=>'true',
//    'generate_weapp_webview'=>'true',
//    'we_app_web_view_short_url'=>'true',
//    'we_app_web_wiew_url'=>'true',
//]);

//查询定向推广商品（仅查询关于自己的）
//$result = $app->goods->direct([
//    'page'=>1,
//    'page_size'=>20
//]);

//本功能适用于采集群等场景。将其他推广者的推广链接转换成自己的；通过此api，可以将他人的招商推广链接，转换成自己的招商推广链接。
//$result = $app->goods->zsUnitUrlGen([
//    'source_url'=>'https://p.pinduoduo.com/jjnmxm8f',
//    'pid'=>'8254052_47650851'
//]);

//查询多多客招商推广计划商品
//$result = $app->goods->zsUnitGoodsQuery([
//    'zs_duo_id'=>'8254052',
//]);

//多多客生成单品推广小程序二维码url
//$result = $app->webapp->qrcodeUrlGen([
//    'p_id'=>'8254052_47650851',
//    'goods_id_list'=>[259579651],
//]);


//获取商品基本信息
//$result = $app->goods->basicInfoGet([
//    'goods_id_list'=>[259579651],
//]);

//运营频道商品查询
//$result = $app->goods->recommendGet([
//    'offset'=>0,
//    'limit'=>400,
//]);


//查询订单详情
//$result = $app->order->detailGet([
//    'order_sn'=>0,
//]);

//查询店铺商品
//$result = $app->mall->goodsListGet([
//    'mall_id'=>'879420',
//    'page_number'=>0,
//    'page_size'=>10,
//]);

//多多客生成店铺推广链接API
//$result = $app->mall->urlGen([
//    'mall_id'=>879420,
//    'pid'=>'8254052_47650851',
//]);

//多多客生成转盘抽免单url
//$result = $app->lottery->urlGen([
//    'pid_list'=>['8254052_47650851'],
//]);

////多多客工具查询转盘拉新订单列表
//$result = $app->lottery->newListGet([
//    'pid'=>'8254052_47650851',
//]);

//生成拼多多主站频道推广
//$result = $app->resource->urlGen([
//    'pid'=>'8254052_47650851',
//]);

//多多客查店铺列表接口
//$result = $app->merchant->list([
//]);

//有色订单
//$result = $app->order->colorIncrementGet([
//    'start_update_time'=>time()-86400,
//    'end_update_time'=>time(),
//]);








print_r($result);
