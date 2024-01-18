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
    <link rel="stylesheet" href="{{ URL::asset('h5/css/style.default.css').'?'.microtime() }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/bootstrap.min.detail.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/app.min.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/icons.min.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/lyy.css').'?'.microtime() }}">
</head>
<script src="{{ URL::asset('h5/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('h5/js/bootstrap.min.js') }}"></script>
<style>
    .is-check {
        border-color: #FF9043;
        padding-right: 2.25rem;
        background-repeat: no-repeat;
        background-position: center right calc(2.25rem / 4);
        background-size: calc(2.25rem / 2) calc(2.25rem / 2);
        background-image: url("{{ URL::asset('pageImg/27.png') }}");
    }

    .form-floating > .form-control:focus, .form-floating > .form-control:not(:placeholder-shown) {
        padding-top: 0;
        padding-bottom: 0;
    }

    .form-floating-icon {
        margin-left: 10px;
        margin-right: 10px;
        width: 100px !important;
        font-size: 18px;
    }

    .form-floating-custom > .form-control, .form-floating-custom > .form-select {
        padding-left: 114px;
        font-size: 20px;
    }

    .footer-div {
        position: static !important;
        background: rgba(251, 251, 251, 0.6) !important;
        text-align: center !important;
        bottom: -100px !important;
        color: #C07C41 !important;
    }
    .icon-img{
        width: auto;
        height: 100%;
        display: block;
        border: 0;
        padding-bottom: 0;
        border-radius: 10px;
    }
    .image-xg{
        width:3rem;
        height:3rem;
        overflow: hidden;
    }
    .card-div-1{
        border-radius: 20px;
    }
    .card-title-1 {
        margin: 7px 0 0 0 !important;
    }
    .card {
        border-radius: 10px;
        margin-bottom: 10px;
    }
    .shadw{
        box-shadow: 0 0 20px 5px #FF5518;
        border-radius:20px;
        filter: brightness(120%);
        -webkit-animation: ani 2s linear infinite;
    }
    .pay_img{
        width:100%;
        height:auto;
        overflow: hidden;
    }
    .form-check-input{
        display: none;
    }
    .pay-div{
        padding-left:0!important;
        margin-right:10px;
    }

</style>
<body>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <!-- card -->
                <div class="card card-h-50 card-div">
                    <img class="bannar" src="{{ URL::asset('pageImg/25.png') }}" alt="">
                </div>
            </div>
        </div>

        <div class="quanbao">
            @if(!empty($data))
                @if(!empty($sell))
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="d-flex align-items-center div-icon">
                                <img src="{{ URL::asset('pageImg/v.png') }}" class="div-icon-img">
                                <h5 class="font-size-17 card-title-1 mb-0 flex-grow-1" style="font-style: italic;">{{ $sell->goods_name ?? '' }}</h5>
                            </div>
                        </div>
                    </div>

                    {{--<div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="card  card-div">
                                <div class="card-body card-div-1">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-17 mb-1">
                                                <span class="text-dark" style="font-style: italic;">{{ $sell->goods_name ?? '' }}</span><br>
                                            </h5>
                                        </div>
                                        <div class="image-xg">
                                            <img
                                                src="{{ URL::asset('pageImg/v.png') }}"
                                                class="icon-img" alt="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>--}}
                @endif
                @foreach($data as $key=>$value)
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <div class="card card-div">
                                    <div class="d-flex align-items-center pb_div">
                                        <div class="image-bak">
                                            <img
                                                src="{{ !empty($value['goods_icon']) ? URL::asset($value['goods_icon']) : URl::asset('pageImg/default.png') }}"
                                                class="quan-img-2" alt="">
                                        </div>
                                        <div class="flex-grow-1 group-div">
                                            <h5 class="font-size-15 mb-2">{{ $value['goods_name'] }}</h5>
                                            <h5 class="font-size-14 mb-2">
                                                <span class="text-muted">{{ $value['sku'] ?? '' }}</span><br>
                                            </h5>
                                            <span class="text-muted price_text">￥<span
                                                    class="price">{{ $value['sell_goods_price'] }}</span>元</span>
                                            <span class="text-muted" style="text-decoration: line-through">￥{{ $value['goods_price'] }}元</span>
                                            <button class="btn btn-primary btn-primary-1 card-link link-btn modal-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#myModal" id="modal-btn"
                                                    data-id="{{ $value['id'] }}"
                                                    data-price="{{ $value['sell_goods_price'] }}">立即开通
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            @else
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card card-div">
                            <div class="card-body" data-simplebar="init">
                                <p>
                                    您的券包已经全部核销或券包已过期不能核销。<br>
                                    &nbsp;<br>
                                    如有问题请联系客服：<br>
                                    客服电话：400-0389-566 <br/>
                                    工作时间：周一至周五9:00-18:00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-bs-scroll="true"
             aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">选择支付方式</h5>
                        <button type="button" class="btn-close close-btn" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex">
                        <input value="" type="hidden" class="order_id">
                        <input value="" type="hidden" class="goods_price">
                        <div class="form-check pay-div">
                            <input class="form-check-input" type="radio" name="payname" id="weixin" value="2">
                            <label class="form-check-label" for="weixin">
                                <img src="{{ URl::asset('pageImg/wei.png') }}" class="quan-img-2 pay_img" style="margin-right: 10px;" alt="">
                            </label>
                        </div>
                        <div class="form-check  pay-div">
                            <input class="form-check-input" type="radio" name="payname" id="zhifubao" value="1" checked>
                            <label class="form-check-label" for="zhifubao">
                                <img src="{{ URl::asset('pageImg/zhi.png') }}" class="quan-img-2 pay_img shadw" alt="">
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-rounded waves-effect close-btn"
                                data-bs-dismiss="modal">
                            取消
                        </button>
                        <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light link-btn"
                                id="paybtn" style="width:60%;">立即支付
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card card-div" style="color:#C07C41;">
                    <div class="card-body" data-simplebar="init">
                        <p>
                            <span style="margin-bottom: 10px;font-size: 17px;">产品说明：</span><br>
                            1.在确定充值前，要确定充值手机号是否绑定了所充值的会员账户;<br>
                            2.请输入需要充值的手机号后，点击立即开通后选择充值方式进行充值;<br>
                            3.充值账号填写错误本次充值不能退款改充，务必填写正确;<br>
                            4.支付后若没有立即收到相应的到账提醒，可能是受系统网络影响请耐心等待1个工作日;<br>
                            5.每张优惠券仅能使用一次，不找零，不退换;<br>
                            6.充值成功后使用充值账号登录APP即可享受相应的优惠服务。<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card card-div" style="color:#C07C41;">
                    <div class="card-body" data-simplebar="init">
                        <p>
                            <span style="margin-bottom: 10px;font-size: 17px;">注意事项：</span><br>
                            1.若优惠券有时间限制，请在有效期内进行充值购买;<br>
                            2.优惠券属于虚拟商品，充值成功后无法退换或者更改，请充值前确保您输入的手机号正确;<br>
                            3.使用优惠券的订单，若充值失败发生售后退货，购买单个商品的优惠，按购买单品时实际支付金额退款；已使用优惠券不退还。<br>
                            4.在法律允许的范围内，本公司享有解释权。<br>
                            5.如有疑问可拨打我们的客服专线400-0389-566，工作时间9:00-18:00。<br>

                        </p>
                    </div>
                </div>
            </div>
        </div>


        <footer class="main-footer pt-1 footer-div">
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
    <div class="footer_btn">
        <div class="form-floating form-floating-custom input-bot">
            <input type="text" class="form-control is-check" id="chargeAccount" placeholder="充值账号"
                   value="{{ $mobile ?? '' }}">
            <div class="form-floating-icon">
                <span for="input-username" style="color:#FF9043;">充值账号</span>
            </div>
        </div>
    </div>
</div>

<div id="alipay" style="display:none;"></div>
</body>
</html>
<script>
    var id = 0;
    var price = 0;
    $(function () {
        $('.form-check-label').click(function () {
            $(this).find('.form-check-input').prop("checked", true);
            $('.pay_img').removeClass("shadw");
            $(this).find('.pay_img').addClass("shadw");
        });

        $('.modal-btn').click(function () {
            //判断手机号
            var charge_account = $("#chargeAccount").val();
            var reg = /^1[3456789]\d{9}$/;
            if (!reg.test(charge_account)) {
                alert('手机号错误,请确认充值手机号');
                $("#chargeAccount").removeClass("form-control is-check")
                $("#chargeAccount").addClass("form-control is-invalid");
                $("#chargeAccount").focus();
                return false;
            } else {
                $("#chargeAccount").removeClass("form-control is-invalid")
                $("#chargeAccount").addClass("form-control is-check");
            }
            id = $(this).data('id');
            price = $(this).data('price');
            $('#myModal').modal();
        });
        $('.close-btn').click(function () {
            $('#myModal').modal('hide');
        });

        $('#myModal').on('show.bs.modal', function (e) {
            var modal = $(this);
            modal.find('.order_id').val(id);
            modal.find('.goods_price').val(price);
        });

        $('#paybtn').click(function () {
            var btn = $("input[type='radio']:checked").val();
            var charge_account = $("#chargeAccount").val();
            var order_id = $('.order_id').val();
            var goods_price = $('.goods_price').val();
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
                data: {order_detail_id: order_id, price: goods_price, charge_account: charge_account, pay_channel: btn},
                success: function (result) {
                    if (result.code != 200) {
                        alert(result.msg);
                        window.location.reload();
                    } else {
                        if (btn == 2) {//微信
                            window.location.href = result.data.h5_url;
                        } else {//支付宝
                            document.getElementById("alipay").innerHTML = result.data.h5_url;
                            document.forms['alipay_submit'].submit();
                        }
                    }
                },
                error: function (xhr, status, error) {
                    alert("网络错误，请重新提交");
                    window.location.reload();
                }
            });

        });

    });
</script>
