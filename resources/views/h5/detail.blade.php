<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>优惠不断,月月省钱</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ URL::asset('h5/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/style.default.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/bootstrap.min.detail.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/app.min.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/icons.min.css') }}" id="theme-stylesheet">
</head>
<style>
    .text_style {
        margin-bottom: 10px !important;
        border-style: none;
        background: rgba(0, 0, 0, 0);
        text-align: center;
    }

    .title {
        padding: 40px;
        height: 100%;
        color: #fff;
    }

    .page {
        background-image: url("{{ URL::asset('h5/backimg.png') }}");
        background-repeat: round;
    }

    .login-page .form-holder .info {
        background: rgba(251, 251, 251, 0.6);
        color: #8F84D0;
    }

    .p-style span {
        font-weight: bold;
    }

    .login-page .container {
        min-height: 0;
        z-index: 0;
        padding: 20px;
        position: relative;
    }

    .price_text {
        font-size: 16px;
        color: #76b3ee !important;
    }

    .logo {
        font-size: x-large;
    }

    .p-style{
        line-height: 1.8;
        margin-top: 20px !important;
        background: white;
    }
</style>
<body>
<div class="page login-page">
    <div class="container align-items-center">
        <div class="text_style">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title align-items-center">
                        <div class="content">
                            <div class="logo">
                                小茄+优惠券
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <!-- card -->
            <div class="card card-h-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">优惠券信息</h4>
                </div>

                <div class="card-body" data-simplebar="init" style="max-height: 300px;overflow: auto;">
                    <div class="d-flex align-items-center pb-4 check_div">
                        <div class="avatar-md me-4">
                            <img
                                src="{{ URL::asset('h5/caomei.png') }}"
                                class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-size-15 mb-1">
                                <span class="text-dark">小白草莓大棚采摘优惠卷</span>
                            </h5>
                            <h5 class="font-size-12 mb-1">
                                <span class="text-dark">2023年10月1日前有效</span>
                            </h5>
                            <span class="text-muted" style="text-decoration: line-through">￥50元</span>
                            <span class="text-muted price_text">￥<span
                                    class="price">35</span>元</span>
                        </div>

                        <div class="flex-shrink-0 text-end">
                            <label class="radio-inline">
                                <input type="radio" class="check_radio" name="inlineRadioOptions"
                                       id="orderId1"
                                       value="1">
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pb-4 check_div">
                        <div class="avatar-md me-4">
                            <img
                                src="{{ URL::asset('h5/WechatIMG245.png') }}"
                                class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-size-15 mb-1">
                                <span class="text-dark">水果捞5折劵</span>
                            </h5>
                            <h5 class="font-size-12 mb-1">
                                <span class="text-dark">2023年8月23日前有效</span>
                            </h5>
                            <span class="text-muted" style="text-decoration: line-through">￥35元</span>
                            <span class="text-muted price_text">￥<span
                                    class="price">17</span>元</span>
                        </div>

                        <div class="flex-shrink-0 text-end">
                            <label class="radio-inline">
                                <input type="radio" class="check_radio" name="inlineRadioOptions"
                                       id="orderId2"
                                       value="2">
                            </label>
                        </div>
                    </div>

                    <div class="d-flex align-items-center pb-4 check_div">
                        <div class="avatar-md me-4">
                            <img
                                src="{{ URL::asset('h5/WechatIMG246.png') }}"
                                class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-size-15 mb-1">
                                <span class="text-dark">甜甜特制煎饼果子</span>
                            </h5>
                            <h5 class="font-size-12 mb-1">
                                <span class="text-dark">2023年10月23日前限定产品有效</span>
                            </h5>
                            <span class="text-muted" style="text-decoration: line-through">￥10元</span>
                            <span class="text-muted price_text">￥<span
                                    class="price">6</span>元</span>
                        </div>

                        <div class="flex-shrink-0 text-end">
                            <label class="radio-inline">
                                <input type="radio" class="check_radio" name="inlineRadioOptions"
                                       id="orderId2"
                                       value="2">
                            </label>
                        </div>
                    </div>
                </div>


            @if(!empty($data))
                <!-- card body -->
                    <div class="card-body" data-simplebar="init" style="max-height: 300px;overflow: auto;">
                        @foreach($data as $value)

                            <div class="d-flex align-items-center pb-4 check_div">
                                <div class="avatar-md me-4">
                                    <img
                                        src="{{ $value['goods_icon'] }}"
                                        class="img-fluid rounded-circle" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="font-size-15 mb-1">
                                        <span class="text-dark">{{ $value['goods_name'] }}</span>
                                    </h5>
                                    <h5 class="font-size-12 mb-1">
                                        <span class="text-dark">{{ $value['sku'] ?? '' }}</span>
                                    </h5>
                                    <span class="text-muted" style="text-decoration: line-through">￥{{ $value['goods_price'] }}元</span>
                                    <span class="text-muted price_text">￥<span
                                            class="price">{{ $value['sell_goods_price'] }}</span>元</span>
                                </div>

                                <div class="flex-shrink-0 text-end">
                                    <label class="radio-inline">
                                        <input type="radio" class="check_radio" name="inlineRadioOptions"
                                               id="orderId{{ $value['id'] }}"
                                               value="{{ $value['id'] }}">
                                    </label>
                                </div>
                            </div>

                        @endforeach
                    </div>
                @else
                    {{--<div class="card-body" data-simplebar="init">目前无可用券包</div>--}}
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class="d-flex align-items-center pb-4">
                <div class="flex-grow-1">
                    <h5 class="font-size-15 mb-1">
                        <span class="text-dark">确认充值手机号</span>
                    </h5>
                    <div class="form-group">
                        <input id="chargeAccount" class="input-material" type="number" maxlength="11"
                               name="charge_account"
                               placeholder="请输入手机号" value="">
                        <div class="invalid-feedback">
                            请确定手机号是否正确
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-6">
            <button type="button" class="btn btn-success paybtn" id="weixinpayBtn" data-id="2">微信支付</button>
            <button type="button" class="btn btn-info paybtn" id="alipayBtn" data-id="1">支付宝支付</button>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="info d-flex align-items-center p-style">
                <div class="content">
                    <p>
                        <span>使用须知：</span><br>

                        1.若优惠券有时间限制，请在有效期内进行充值购买;<br>

                        2.支付后若没有立即收到相应的到账提醒，可能是受系统网络影响请耐心等待1个工作日;<br>

                        3.每张优惠券仅能使用一次，不找零，不退换;<br>

                        4.使用优惠券的订单，若发生售后退货，购买单个商品的优惠，按购买单品时实际支付金额退款；已使用优惠券不退还。<br>

                        5.在法律允许的范围内，本公司享有解释权。<br>
                        6.如有疑问可拨打我们的客服专线400-0389-566，工作时间9:00-18:00。<br>

                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <footer class="main-footer pt-1" style="background: #d0d1d3;text-align: center;bottom: -100px;">
            <p class="p-copyright qm-footer-con-row" style="margin-top: 10px;">
                上海小茄 &nbsp;&nbsp;
                <a href="https://beian.miit.gov.cn/#/Integrated/index" target="_blank" data-v-5250deac="">
                    沪ICP备2021007037号-2
                </a>
                <br/>
                客服电话：400-0389-566 <br/>工作时间：周一至周五9:00-18:00
            </p>
        </footer>
    </div>

</div>

<div id="alipay" style="display:none;"></div>
<!-- JavaScript files-->
<script src="{{ URL::asset('h5/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('h5/js/bootstrap.min.js') }}"></script>
<script>
    $(function () {
        //点击本行设置按钮选中
        $('.check_div').click(function () {
            $(this).find('.check_radio').prop("checked", true);
        });

        //支付  2 微信  1 支付宝
        $('.paybtn').click(function () {
            var btn = $(this).data('id');
            if (!btn) {
                btn = 2;//默认微信
            }
            var id = $("input[type='radio']:checked").val();
            var charge_account = $("#chargeAccount").val();
            var price = $("input[type='radio']:checked").parent().parent().prev().find('.price').text();

            var reg = /^1[3456789]\d{9}$/;
            if (!reg.test(charge_account)) {
                alert('手机号错误');
                $("#chargeAccount").removeClass("form-control is-valid")
                $("#chargeAccount").addClass("form-control is-invalid");
                $("#chargeAccount").focus();
                return false;
            } else {
                $("#chargeAccount").removeClass("form-control is-invalid")
                $("#chargeAccount").addClass("form-control is-valid");
            }
            if (typeof (id) == "undefined" || !id) {
                alert('请选择需要使用的劵');
                return false;
            }

            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
            });
            $.ajax({
                url: "{{url('h5/index/pay/index')}}",
                type: "POST",
                data: {order_detail_id: id, price: price, charge_account: charge_account, pay_channel: btn},
                success: function (result) {
                    console.log(result);
                    if (result.code != 200) {
                        alert(result.msg);
                    } else {
                        if (btn == 2) {//微信
                            window.location.href = result.data.h5_url;
                        } else {//支付宝
                            document.getElementById("alipay").innerHTML = result.data.h5_url;
                            document.forms['alipay_submit'].submit();
                        }
                    }
                }
            });


        });
    });
</script>
</body>
</html>
