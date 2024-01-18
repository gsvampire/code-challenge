<?php
/**
 * order.php
 * 2023/6/28 16:19
 * guoshuai
 */

return [
    'labels' => [
        'Order' => '订单管理',
    ],
    'fields' => [
        'id' => '序号',
        'detail_order_no' => '小茄订单编号',
        'supply_no' => '供货商编号',
        'supply_name' => '供货商名称',
        'goods_no' => '商品编号',
        'goods_type' => '商品类型',
        'goods_name' => '商品名称',
        'channel_name' => '渠道名称',
        'pay_num' => '数量',
        'order_status' => '订单状态',
        'order_type' => '订单类型',
        'purchase_phone' => '下单账号',
        'redeem_code' => '兑换码编号',
        'created_at' => '下单日期',
        'operator' => '修改人',
        'updated_at' => '修改时间',
        'order_start_at' => '起始有效期',
        'order_end_at' => '截止有效期',
        'goods_price' => '市场价',
        'supply_price' => '供货商价格',
        'channel_price' => '渠道价格',
        'sku_info' => 'sku属性',
        'valid_days' => '有效期',
        'charge_account' => '充值账号',
        'transaction_id' => '支付流水',
        'pay_price' => '支付金额',
        'pay_channel' => '支付渠道',
        'finish_order_time' => '支付时间',
        'finish_time' => '支付时间',
        'pay_status' => '支付状态',
        'direct_order_type' => '直冲订单',
        'order_no' => '渠道订单',
    ],
    'options' => [
    ],
];
