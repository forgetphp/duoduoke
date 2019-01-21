<?php

/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/28
 * Time: 下午3:52
 * @author chenhong <747825455@qq.com>
 */
namespace DuoDuoKe;


class Type
{

    /**
     * @version 1.0.1
     */
    const VERSION = '1.0.0';

    /**
     * @property string pdd.ddk.goods.detail 查询多多进宝商品详情
     */
    const GOODS_DETAIL = 'pdd.ddk.goods.detail';

    /**
     * @property string pdd.ddk.goods.search 多多进宝商品查询
     */
    const GOODS_SEARCH =  'pdd.ddk.goods.search';

    /**
     * @property string pdd.ddk.goods.pid.query 多多进宝商品查询
     */
    const GOODS_PID_QUERY =  'pdd.ddk.goods.pid.query';

    /**
     * @property string pdd.ddk.goods.pid.generate 创建多多进宝推广位
     */
    const GOODS_PID_GENERATE =  'pdd.ddk.goods.pid.generate';

    /**
     * @property string pdd.ddk.goods.promotion.url.generate 生成普通商品推广链接
     */
    const GOODS_PROMOTION_URL_GENERATE =  'pdd.ddk.goods.promotion.url.generate';

    /**
     * @property string pdd.ddk.order.list.increment.get 按照时间段获取授权多多客下面所有多多客的推广订单信息
     */
    const ORDER_LIST_INCREMENT_GET =  'pdd.ddk.order.list.increment.get';

    /**
     * @property string pdd.ddk.rp.prom.url.generate 生成红包推广链接接口
     */
    const RP_PROM_URL_GENERATE =  'pdd.ddk.rp.prom.url.generate';

    /**
     * @property string pdd.ddk.cms.prom.url.generate 生成商城推广链接接口
     */
    const CMS_PROM_URL_GENERATE =  'pdd.ddk.cms.prom.url.generate';

    /**
     * @property string pdd.ddk.theme.list.get 查询多多进宝主题列表
     */
    const THEME_LIST_GET =  'pdd.ddk.theme.list.get';

    /**
     * @property string pdd.ddk.theme.goods.search 多多进宝主题商品查询
     */
    const THEME_GOODS_SEARCH =  'pdd.ddk.theme.goods.search';

    /**
     * @property string pdd.ddk.theme.prom.url.generate 多多进宝主题活动推广链接生成
     */
    const THEME_PROM_URL_GENERATE =  'pdd.ddk.theme.prom.url.generate';

    /**
     * @property string pdd.ddk.direct.goods.query 查询定向推广商品（仅查询关于自己的）
     */
    const DIRECT_GOODS_QUERY =  'pdd.ddk.direct.goods.query';

    /**
     * @property string pdd.ddk.goods.zs.unit.url.ge n本功能适用于采集群等场景。将其他推广者的推广链接转换成自己的；通过此api
     * ，可以将他人的招商推广链接，转换成自己的招商推广链接。
     */
    const GOODS_ZS_UNIT_URL_GEN =  'pdd.ddk.goods.zs.unit.url.gen';

    /**
     * @property string pdd.ddk.zs.unit.goods.query 查询多多客招商推广计划商品
     */
    const ZS_UNIT_GOODS_QUERY =  'pdd.ddk.zs.unit.goods.query';

    /**
     * @property string pdd.ddk.weapp.qrcode.url.gen 多多客生成单品推广小程序二维码url
     */
    const QRCODE_URL_GEN =  'pdd.ddk.weapp.qrcode.url.gen';

    /**
     * @property string pdd.ddk.goods.basic.info.get 获取商品基本信息接口
     */
    const GOODS_BASIC_INFO_GET =  'pdd.ddk.goods.basic.info.get';

    /**
     * @property string pdd.ddk.goods.recommend.get 运营频道商品查询API
     */
    const GOODS_RECOMMENT_GET =  'pdd.ddk.goods.recommend.get';

    /**
     * @property string pdd.ddk.order.detail.get 查询订单详情
     */
    const ORDER_DETAIL_GET =  'pdd.ddk.order.detail.get';

    /**
     * @property string pdd.ddk.mall.goods.list.get 查询店铺商品
     */
    const MALL_GOODS_LIST_GET =  'pdd.ddk.mall.goods.list.get';

    /**
     * @property string pdd.ddk.mall.url.gen 多多客生成店铺推广链接API
     */
    const MALL_URL_GEN =  'pdd.ddk.mall.url.gen';

    /**
     * @property string pdd.ddk.lottery.url.gen 多多客生成转盘抽免单url
     */
    const LOTTERY_URL_GEN =  'pdd.ddk.lottery.url.gen';

    /**
     * @property string pdd.ddk.lottery.new.list.get 多多客查询转盘拉新订单列表
     */
    const LOTTERY_NEW_LIST_GET =  'pdd.ddk.lottery.new.list.get';

    /**
     * @property string pdd.ddk.resource.url.gen 生成拼多多主站频道推广
     */
    const RECOURCE_URL_GEN =  'pdd.ddk.resource.url.gen';

    /**
     * @property string pdd.ddk.merchant.list.get 多多客查店铺列表接口
     */
    const MERCHANT_LIST_GET =  'pdd.ddk.merchant.list.get';

    /**
     * @property string pdd.ddk.color.order.increment.get 新增染色补贴订单增量查询接口
     */
    const COLOR_ORDER_INCREMENT_GET =  'pdd.ddk.color.order.increment.get';

    /**
     * @property string pdd.ddk.top.goods.list.query 获取热销商品列表
     */
    const TOP_GOODS_LIST_QUERY =  'pdd.ddk.top.goods.list.query';
}