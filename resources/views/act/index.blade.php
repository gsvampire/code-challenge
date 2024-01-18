<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>超值季度购</title>
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
    <link rel="stylesheet" href="{{ URL::asset('h5/css/owl.carousel.min.css') }}">
</head>
<script src="{{ URL::asset('h5/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('h5/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('h5/js/owl.carousel.min.js') }}"></script>
<style>
    body {
        background-image: url("{{ URL::asset('pageImg/64.png') }}");
        background-repeat: round;
        background-size: cover;
    }

    .card-title {
        margin: 7px 0 0 0 !important;
    }

    .card-div {
        border-radius: 10px;
        background: #fff;
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

    .bannar_div {
        padding-right: 0;
        padding-left: 0;
    }

    .submit_btn {
        width: 92%;
        padding: 0;
        border-width: 0px;
        position: fixed;
        z-index: 3;
        bottom: 0.3125rem;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .submit_btn .submit-btn-box {
        width: 80%;
        margin: 0 auto;
        animation: button_mo 1s infinite;
        padding: 0.46875rem 0;
        font-family: SourceHanSansCN-Medium;
        font-size: 1.5rem;
        letter-spacing: .03125rem;
        color: #fcf0c6;
        background-color: #755e55;
        background-image: linear-gradient(to bottom, #f38479, #da403e);
        border-radius: 8.1875rem;
        text-align: center;
        border: 1px solid #fcf0c6;
    }

    .submit_btn .submit-btn-box .worth {
        color: #fcf0c6;
        font-size: .99rem;
        white-space: pre-line;
    }

    .form-btn {
        animation: button_mo 1s infinite;
    }

    @keyframes button_mo {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
        }
    }

    .nav-tabs-custom .nav-item .nav-link::after {
        background: #74788d;
    }

    .form-card {
        background-color: #f4b2a7ba !important;
        border-radius: 25px;
    }

    #mobile-input {
        border-radius: 25px;
    }

    .regbtn {
        width: 100%;
        border-radius: 3.25rem;
        border-color: #f2d091;
        background-image: linear-gradient(to bottom, #FFA496, #D32D2D);
        font-family: SourceHanSansCN-Medium;
        font-size: 1.15625rem;
        letter-spacing: .03125rem;
        color: #fcf0c6;
        border-radius: 8.1875rem;
        text-align: center;
        font-weight: bold;
    }

    .regbtn:hover {
        text-decoration: none;
        background-color: #FFA496;
        border-color: #FFA496;
        color: #fcf0c6;
    }

    .owl-dots {
        height: 0;
    }

</style>
<body>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <input type="hidden" class="wpay" value="{{ $data }}">
            <div class="col-xl-12 col-md-12 bannar_div">
                <img class="bannar" src="{{ URL::asset('pageImg/header001.png') }}" alt="">
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-md-12 bannar_div click_div">
                <img class="bannar"
                     src="{{ !empty($info['icon']) ? URL::asset($info['icon']) : URl::asset('pageImg/header_bar.png') }}"
                     alt="">
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card form-card" id="form-card">
                    <div class="card-body">
                        <div style="padding:10px;">
                            <input class="form-control form-control-lg" type="text" maxlength="12" id="mobile-input"
                                   placeholder="请输入手机号领取" required>
                        </div>
                        <div class="form-btn">
                            <img class="bannar" src="{{ URL::asset('pageImg/btn_01.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="submit_btn" style="display: none;">
            <div class="form-btn">
                <img class="bannar" src="{{ URL::asset('pageImg/btn_01.png') }}" alt="">
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-md-12 bannar_div click_div">
                <img class="bannar" src="{{ URL::asset('pageImg/act_hui_002.png') }}" alt="">
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-md-12 bannar_div">
                <div id="carouselSlides" class="carousel slide ">
                    <div class="carousel-inner owl-carousel owl-theme" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid mx-auto" src="{{ URL::asset('pageImg/919_3.png') }}"
                                 alt="Third slide">
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block img-fluid mx-auto" src="{{ URL::asset('pageImg/919_1.png') }}"
                                 alt="First slide">
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block img-fluid mx-auto" src="{{ URL::asset('pageImg/919_2.png') }}"
                                 alt="Second slide">
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block img-fluid mx-auto" src="{{ URL::asset('pageImg/919_6.png') }}"
                                 alt="Four slide">
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block img-fluid mx-auto" src="{{ URL::asset('pageImg/919_5.png') }}"
                                 alt="Third slide">
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block img-fluid mx-auto" src="{{ URL::asset('pageImg/919_4.png') }}"
                                 alt="Four slide">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-md-12 bannar_div">
                <img class="bannar" src="{{ URL::asset('pageImg/act_hui_02.png') }}" alt="">
            </div>
        </div>

{{--        <div class="row">--}}
{{--            <div class="col-xl-12 col-md-12 bannar_div" style="margin-top:-20px;">--}}
{{--                <img class="bannar" src="{{ URL::asset('pageImg/youhui23ed.png') }}" alt="">--}}
{{--            </div>--}}
{{--        </div>--}}
        <input type="hidden" class="openid" value="{{ $useropenid }}">
        <input type="hidden" class="source" value="{{ $channel_source }}">
        <input type="hidden" class="price" value="{{ $info['goods_price'] ?? 0 }}">

        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card card-div" style="color:#C07C41;">
                    <div class="card-body" data-simplebar="init">
                        <p>
                            <span style="margin-bottom: 10px;font-size: 17px;">活动说明：</span><br>
                            1.活动时间:2023.10.01 00:00~2024.12.31 23:59<br>
                            2.客服咨询:400-0389-566(工作日9:00-12:00 13:30-18:00)<br>
                            3.活动对象:所有用户均可参与活动，具体以实际办理为准。<br>
                            4.产品资费:本产品为会员季卡，{{ $info['goods_price'] ?? '39.9' }}元/季度。<br>
                            5.购买成功后会员权益将立即生效，如对产品有异议或者建议等，请联系客服记录处理。<br>
                            6.严禁以任何形式翻录或转载、未经许可在第三方平台传播，违者将追究法律责任。<br>
                            7.会员权益说明:<br>
                            (1)会员权益开通后，首月自动下发5元+5元无门槛停车优惠券(价值10元)；并且可立即领取会员权益N选一周卡任选会员。(价值10元)。优惠券查看路径[捷停车]-[我的]-[个人中心]-[优惠券]。<br>
                            (2)开通次月，用户可进入微信公众号“小茄+”,点击底部菜单栏“停车券”登陆后点击“立即领取”即可领取优惠券成功；领取后优惠券直接下发至及捷停车微信小程序或者APP，可前往优惠券页面使用。(每30天可领取1次共2次)。<br>
                            (3)优惠券领取成功后的有效期均为7天，发放后7天内有效，每张优惠券仅可使用一次，过期自动作废。<br>
                            (4)相关会员权益请通过微信公众号“小茄+”会员中心登录领取；每30天可领取一次热门视频会员月卡一张(包含腾讯视频、爱奇艺、芒果TV、优酷等视频会员),共可领3次。<br>
                            (5)请注意查看相关权益的视频会员有效领取时间及使用时间，逾期作废不予补发。<br>
                            8.使用相关权益时，请遵守相应平台的用户服务协议和权益使用协议，如违反相关协定规定，运营商和联合权益提供方均有权单独进行处理，包括但不限于中止或终止提供其所属平台的服务及要求侵权赔偿等。<br>
                            9.每个手机号终生限参与一次，办理后立即生效，退订后无法再次办理。<br>
                            10.我们可能会根据本服务的整体规划，对本服务相关权益细则收费标准权益发放方式等进行修改和变更，前诉修改、变更的内容，我们将在相关服务页面公式或以其他合理的方式进行告知，并在告知后生效。<br>
                            11.因权益方内部调整，我们可能会终止和权益方的合作，您可能无法通过我们享受权益方提供的产品。届时您可以选择享受其他权益方提供的产品，同时公司将及时公告和告知。如因此导致您无法使用或购买产品的，请您理解我们无需对此承当责任。可能给您带来的不便，敬请谅解。<br>
                            12.图片仅供参考，活动最终解释权归主办方所有。<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="alipay" style="display:none;"></div>
<script src="{{ URL::asset('h5/js/message.js') }}"></script>
</body>
<script>
    $(function () {
        var clickBtn = false;
        $('.owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            speed: 3000,
            autoplayTimeout: 3000
        });
        //按钮显示
        $(window).scroll(function () {
            var h = $(this).scrollTop();//获得滚动条距top的高度
            var input_btn = $('#mobile-input').offset().top;
            if (h > input_btn+50) {
                $(".submit_btn").fadeIn();
            } else {
                $(".submit_btn").fadeOut();
            }
        });

        $('.submit_btn,.click_div,.form-btn').click(function () {
            var mobile = $('#mobile-input').val();
            var reg = /^1[3456789]\d{9}$/;
            if (!reg.test(mobile)) {
                //alert('手机号错误,请确认充值手机号');
                $("#mobile-input").removeClass("form-control is-check")
                $("#mobile-input").addClass("form-control is-invalid");
                $("#mobile-input").focus();
                $('html, body').animate({
                    scrollTop: $("#form-card").offset().top
                }, 1000);
                return false;
            } else {
                $("#mobile-input").removeClass("form-control is-invalid")
                $("#mobile-input").addClass("form-control is-check");
            }

            var btn = 3;
            var wpay = $('.wpay').val();
            var openid = $('.openid').val();
            var source = $('.source').val();
            var price = $('.price').val();
            if(clickBtn){
                alert('提交中，请稍后');
                return false;
            }
            if (!openid) {
                alert('未获取到openid,请确定重新授权').then(() => {
                    window.location.href = "{{ url('/xqlimit/active/2') }}";
                });
                return false;
            }
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
            });
            $.ajax({
                url: "{{url('/act/addLimitActiveOrder')}}",
                type: "POST",
                data: {
                    charge_account: mobile,
                    pay_channel: btn,
                    wpay: wpay,
                    openid: openid,
                    channel_source: source,
                    price: price
                },
                beforeSend:function(XMLHttpRequest){
                    clickBtn = true;//阻止连续提交
                    //alert('提交中，请稍后');
                },
                success: function (result) {
                    clickBtn = false;
                    if (result.code != 200) {
                        alert(result.msg);
                        //window.location.reload();
                    } else {
                        console.log(result.data);

                        function onBridgeReady() {
                            WeixinJSBridge.invoke('getBrandWCPayRequest', result.data,
                                function (res) {
                                    if (res.err_msg == "get_brand_wcpay_request:ok") {
                                        alert({
                                            title: '办理成功',
                                            content: '您已购买成功！停车券已发放至您的优惠券账户。其他会员福利、次月及以后的停车券，请前往“小茄+”公众号领取。',
                                            doneText: '确定'
                                        }).then(() => {
                                            window.location.reload();
                                        });

                                    } else {
                                        alert('支付已取消');
                                    }
                                });
                        }

                        if (typeof WeixinJSBridge == "undefined") {
                            if (document.addEventListener) {
                                document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
                            } else if (document.attachEvent) {
                                document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
                                document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
                            }
                        } else {
                            onBridgeReady();
                        }
                    }
                },
                error: function (xhr, status, error) {
                    clickBtn = false;
                    alert("网络程序错误，请刷新页面重新提交");
                    //window.location.reload();
                }
            });
        });

        $("#mobile-input").on("input", function() {
            $("#mobile-input").removeClass("form-control is-invalid");
            $("#mobile-input").addClass("form-control is-check");
        });
        $('.nav li a').on('click', function () {
            $(this).addClass('active').parent().siblings().find('a').removeClass('active');
            var id = $(this).attr('tab-div');
            $(id).addClass('active show').siblings().removeClass('active show');
        });

    });
</script>
</html>
