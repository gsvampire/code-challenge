<?php

namespace App\Support;

class ErrorNO
{
    //基础错误码
    const ParamERROR = ['code' => 10000, 'msg' => '参数错误'];
    const ExceptionERROR = ['code' => 10001, 'msg' => '抛出异常错误'];


    //短信错误码
    const SmsMobileErr = ['code' => 20000, 'msg' => '手机号错误', 'error' => '手机号错误'];
    const SmsLimitMaxErr = ['code' => 20001, 'msg' => '每个手机每天最多只能发送5次短信验证码'];
    const SmsReuseErr = ['code' => 20002, 'msg' => '验证码已发送,请勿重复点击'];
    const SmsSendErr = ['code' => 20003, 'msg' => '发送失败'];
    const SmsReTry = ['code' => 20004, 'msg' => '请重新获取'];
    const SmsVerificationErr = ['code' => 20005, 'msg' => '验证码错误'];
    const SmsNoticeLimitMaxErr = ['code' => 20006, 'msg' => '每个手机每天最多只能发送5次兑换短信'];



    const OrderExists = ['code' => 30000, 'msg' => '订单已经存在'];
    const GoodsFailure = ['code' => 30001, 'mes' => '供货商商品失效'];
    const OrderCreateFailed = ['code' => 30002, 'mes' => '创建订单失败'];

    //福禄对接错误码
    const FuluOrderCreateFailed = ['code' => 30003, 'mes' => '福禄订单创建失败'];
    const FuluOperationErr = ['code' => 30004, 'mes' => '福禄调用出错：'];
    const OrderUpdateStatusErr = ['code' => 30007, 'msg' => '更新状态出错'];
    const XqOrderErr = ['code' => 30008, 'msg' => '订单信息出错'];

    //兑换问题
    const ExchangeErr = ['code'=>40000,'msg'=>'兑换码失效或者订单出错'];


    //回调错误
    const CallBackSignErr = ['code' => 60000, 'msg' => '验签失败或者数据错误'];
    const CallBackOperationErr = ['code' => 60001, 'msg' => '回调程序性错误'];

    //彦浩对接
    const YanhaoOperationErr = ['code' => 50000, 'mes' => '彦浩调用出错：'];
    const YanhaoOrderCreateFailed = ['code' => 50001, 'mes' => '彦浩订单创建失败'];

    //万达电影票对接
    const WDOperationErr = ['code' => 70000, 'mes' => '万达调用出错：'];
    const WDOrderCreateFailed = ['code' => 70001, 'mes' => '万达订单创建失败'];
    const WDOrderCreateError = ['code' => 70002, 'mes' => '万达订单绑定错误'];

    //团油
    const TYOperationErr = ['code' => 80000, 'mes' => '团油调用出错：'];

}
