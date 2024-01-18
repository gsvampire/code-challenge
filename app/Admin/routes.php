<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();


Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),

], function (Router $router) {
    $router->post('getSmsCode', 'AuthController@getSmsCode');

});

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => ['web', 'admin', 'checkUserAction'],
], function (Router $router) {

    $router->resource('auth/users', 'AdminUserController');

    $router->get('/', 'HomeController@index');
    $router->get('download/excel/{id}', 'HomeController@downloadExcelTemplate');


    $router->get('getChild', 'XqGoodsCategoryController@child');
    //类目配置
    $router->resource('categroy', 'XqGoodsCategoryController');
    //供货商配置
    $router->resource('supply', 'XqSupplierController');
    //渠道配置
    $router->resource('channel', 'XqChannelController');

    //商品信息管理
    $router->resource('goods', 'XqGoodController');
    //商品供货管理
    $router->resource('goods-supply', 'GoodsSupplyController');
    //商品销售管理
    $router->resource('channel-goods', 'ChannelGoodsController');
    //查询下拉框的供货商名称
    $router->get('select/getSupplyInfo', 'GoodsSupplyController@getSupplyInfo');
    //查询下拉框的商品名称
    $router->get('select/getTempGoodsName', 'ChannelGoodsController@getTempGoodsName');
    //查询下拉框的商品类型
    $router->get('select/getTempGoodsType', 'ChannelGoodsController@getTempGoodsType');
    //查询下拉框的渠道名称
    $router->get('select/getTempChannelName', 'ChannelGoodsController@getTempChannelName');

    //退款订单
    $router->resource('refund', 'XqRefundOrderController');
    //订单管理
    $router->resource('order', 'OrderController');
    //兑换码管理
    $router->resource('redeem-code', 'RedeemCodeController');
    //退款操作
    $router->post('refund/confirm', 'XqRefundOrderController@refund');
    //二次支付，原路退回
    $router->post('refund/order', 'XqRefundOrderController@refundOrder');
    //积分退回
    $router->post('refund/point', 'XqRefundOrderController@refundPoint');
    //属性联动
    $router->get('getConfList', 'XqGoodsAttributeTypeController@getConfList');
    //sku
    $router->resource('sku', 'XqGoodsSkuController');

    //商品下的sku列表
    $router->get('skuList', 'XqGoodsSkuController@getSkuList');
    //sku里的子商品
    $router->get('childSkuList', 'XqGoodsSkuController@childSkuList');


    $router->any('file/upload', 'FileUploadController@handle');
    //短信查询
    $router->resource('sms','SmsController');

    //数据统计
    $router->resource('data', 'DataController');
    //建议
    $router->resource('suggestion', 'SuggestionController');

    //访问量统计
    $router->resource('visit', 'VisitController');

    //商品个性化配置
    $router->resource('setting', 'XqGoodsSettingController');
    //卡密
    $router->resource('code', 'XqOrderCardPasswordController');

    //卡密，卡券
    $router->resource('voucher', 'XqVoucherController');

    //小茄虚拟兑换码
    $router->resource('virtualCode', 'XqVirtualExchangeCodeController');


    //challenge
    $router->resource('challenge', 'ChallengeController');
});
