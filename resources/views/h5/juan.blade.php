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
    .bannar_image {
        width: 100%;
        height: 100%;
        padding: 0 10px 10px 10px;
        border-radius: 10px;
    }

    .div-icon-img {
        max-width: 30px !important;
    }

    .card-title {
        margin: 7px 0 0 0 !important;
    }

    .card-div {
        border-radius: 10px;
        background: #fff;
    }

    .time-div {
        float: right;
        padding: 0 10px 10px;
    }

    .footer-div {
        position: static !important;
        background: rgba(251, 251, 251, 0.6) !important;
        text-align: center !important;
        bottom: -100px !important;
        color: #C07C41 !important;
    }

    .page-content {
        padding: 10px 0 !important;
    }

    .card {
        margin-bottom: 10px;
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

        @if(!empty($data))
            @foreach($data as $k=>$value)
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card card-div">
                            <input type="hidden" class="order_detail_id" value="{{ $value['channel_sell_order_id'] }}">
                            <div class="d-flex align-items-center div-icon">
                                <img src="{{ URL::asset('pageImg/check.png') }}" class="div-icon-img">
                                <h5 class="card-title mb-0 flex-grow-1"
                                    style="font-style: italic;">{{ $value['goods_name'] }}</h5>
                            </div>
                            <div class="d-flex flex-div">
                                <img
                                    src="{{ !empty($value['icon']) ? URL::asset($value['icon']) : URL::asset('pageImg/group_icon.png') }}"
                                    class="bannar_image">
                            </div>
                            <div class="d-flex align-items-center time-div">
                                <span
                                    class="text-muted">* 到期时间：{{ date('Y-m-d',strtotime($value['order_end_at'])) }}</span>
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
</div>
</body>
<script>
    $(function () {
        $('.card-div').click(function () {
            var id = $(this).find('.order_detail_id').val();
            window.location.href = "{{ url('/detail') }}/" + id;
        });
    });
</script>
</html>
