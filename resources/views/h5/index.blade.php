<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>兑换页面</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ URL::asset('h5/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/style.default.css') }}" id="theme-stylesheet">
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
        background-image: url("{{ URL::asset('pageImg/bj.png') }}");
        background-repeat: round;
        background-size: cover;
    }

    .login-page .form-holder .info {
        background: rgba(251, 251, 251, 0.6);
        color: #C07C41;
    }

    .logo {
        font-size: 8vw;
    }

    .getcode {
        display: inline-block;
        float: right;
        font-size: 10px;
        border-radius: 3.25rem;
        background: #ffffff;
        color: #FF7C17;
        font-weight: 400;
        line-height: 1.5;
        padding: 0.375rem 0.75rem;
        border: 1px solid transparent;
        border-color: #FF7C17;
    }

    .regbtn {
        width: 80%;
        border-radius: 3.25rem;
        background: #FF7C17;
        color: white;
        background-image: linear-gradient(to right, #FF9043 , #FF5518);
    }

    .regbtn:hover {
        text-decoration: none;
        background-color: #FF7C17;
        border-color: #FF7C17;
    }

    .p-style {
        line-height: 1.8;
    }

    .p-style span {
        font-weight: bold;
    }

    .footer-div {
        position: static !important;
        background: rgba(251, 251, 251, 0.6) !important;
        text-align: center !important;
        bottom: -100px !important;
        color: #C07C41 !important;
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
                                <span>会员权益轻松换</span>
                            </div>
                            <p>请仔细核对账号，数字权益类产品无法退换，请仔细核对</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Form Panel    -->
                <div class="col-lg-12 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            <div class="form-group">
                                <input id="redeem" class="input-material" type="text" name="redeem"
                                       placeholder="请输入兑换码">
                                <div class="invalid-feedback">
                                    请确定兑换码是否正确
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="cell" class="input-material" type="text" maxlength="11" name="cell"
                                       placeholder="请输入兑换手机号">
                                <div class="invalid-feedback">
                                    请确定兑换手机号是否正确
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="code" class="input-material" type="text" name="code" placeholder="验证码"
                                       style="width:50%;display: inline-block;">
                                <span id="getcode" name="getcode" class="getcode">发送验证码
                                </span>

                                <div class="invalid-feedback">
                                    验证码不能为空
                                </div>
                            </div>
                            <div class="form-group" style="text-align: center;">
                                <button id="regbtn" type="button" name="registerSubmit" class="btn btn-primary-1 regbtn"
                                        style="color:white;">
                                    确认兑换
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-holder has-shadow">
            <div class="row">
                <div class="col-lg-12">
                    <div class="info d-flex align-items-center p-style"
                         style="padding-top: 10px !important;padding-bottom: 10px !important;">
                        <div class="content">
                            <p>
                                <span>使用须知：</span><br>

                                1.请在有效期内兑换，逾期兑换将失效;<br>

                                2.兑换后若没有立即开通会员服务，可能是受系统网络影响请耐心等待1个工作日;<br>

                                3.您购买的万达影城电影票通用券，可在微信搜索“万达电影”小程序，使用兑换手机号登录，在“我的-我的资产 可用券”中查看到账情况、选座观影。<br>

                                4.您购买的瑞幸咖啡代金券，可在微信搜索“瑞幸咖啡”，使用兑换手机号登录，在“我的-咖啡钱包”中查看到账情况。<br>

                                5.在法律允许的范围内，本公司享有解释权。<br>

                                <span>温馨提示：</span><br>

                                1.未在指定时间内兑换权益，而导致权益过期无法使用的，不支持售后。<br>

                                2.如有疑问可拨打我们的客服专线400-0389-566，工作时间9:00-18:00。<br>


                            </p>
                        </div>
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
<!-- JavaScript files-->
<script src="{{ URL::asset('h5/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('h5/js/bootstrap.min.js') }}"></script>
<script>
    var time = 60;
    var clickBtn = false;

    //等待时间
    function waitTime(option) {
        if (time == 0) {
            $('#getcode').attr("disabled", false);
            $('#getcode').text('获取验证码');
            time = 60;
        } else {
            $('#getcode').attr("disabled", true);
            $('#getcode').text("重新发送(" + time + ")");
            time--;
            setTimeout(function () {
                waitTime(option)
            }, 1000)
        }
    }


    $(function () {
        var flagRedeem = false;
        var flagCell = false;
        var flagCode = false;

        $("#redeem").change(function () {
            var redeem = $("#redeem").val();
            if (redeem.length < 6 || redeem.length > 20) {
                $("#redeem").removeClass("form-control is-valid")
                $("#redeem").addClass("form-control is-invalid");
                flagRedeem = false;
            } else {
                $("#redeem").removeClass("form-control is-invalid")
                $("#redeem").addClass("form-control is-valid");
                flagRedeem = true;
            }
        })

        $("#cell").change(function () {
            var cell = $("#cell").val();
            if (cell.length < 11 || cell.length > 11) {
                $("#cell").removeClass("form-control is-valid")
                $("#cell").addClass("form-control is-invalid");
                flagCell = false;
            } else {
                $("#cell").removeClass("form-control is-invalid")
                $("#cell").addClass("form-control is-valid");
                flagCell = true;
            }
        })

        $("#code").change(function () {
            var code = $("#code").val();
            if (code.length < 6 || code.length > 18) {
                $("#code").removeClass("form-control is-valid")
                $("#code").addClass("form-control is-invalid");
                flagCode = false;
            } else {
                $("#code").removeClass("form-control is-invalid")
                $("#code").addClass("form-control is-valid");
                flagCode = true;
            }
        })


        //获取验证码
        $('#getcode').click(function () {
            $("#code").attr("required", true);
            $('#getcode').attr("disabled", true);
            var cell = $("#cell").val();
            var redeem = $("#redeem").val();
            var reg = /^1[3456789]\d{9}$/;
            if (!reg.test(cell)) {
                alert('手机号错误');
                this.removeAttribute("disabled");
                $("input[name='cell']").focus();
            } else {
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                });

                $.ajax({
                    url: "{{url('h5/index/sendSmsCode')}}",
                    type: "POST",
                    data: {phone_num: cell, redeem_code: redeem},
                    success: function (result) {
                        console.log(result);
                        if (result.code != 200) {
                            alert(result.msg);
                            $('#getcode').attr("disabled", false);
                        } else {
                            //开始倒计时
                            waitTime(this);
                        }
                    }
                });


            }
        });

        $("#regbtn").click(function () {
            if (!flagRedeem) {
                $("#redeem").addClass("form-control is-invalid");
            }
            if (!flagCell) {
                $("#cell").addClass("form-control is-invalid");
            }
            if (!flagCode) {
                $("#code").addClass("form-control is-invalid");
            }
            if(clickBtn){
                alert('正在请求中，请稍后');
                return false;
            }

            if (flagRedeem && flagCell && flagCode) {
                clickBtn = true;
                $('#regbtn').attr("disabled", true);
                var cell = $("#cell").val();
                var redeem = $("#redeem").val();
                var code = $('#code').val();
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                });

                $.ajax({
                    url: "{{url('h5/index/confirmExchange')}}",
                    type: "POST",
                    data: {phone_num: cell, redeem_code: redeem, sms_code: code},
                    success: function (result) {
                        console.log(result);
                        if (result.code != 200) {
                            alert(result.msg);
                            clickBtn = false;
                            $('#getcode').attr("disabled", false);
                            $('#regbtn').attr("disabled", false);
                        } else {
                            alert('兑换成功,请查看相关权益是否到账');
                            window.location.reload();
                        }
                    }
                });
            }
        })
    })
</script>
</body>
</html>
