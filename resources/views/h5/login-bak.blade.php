<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>上海小茄</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ URL::asset('h5/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/style.default.css') }}" id="theme-stylesheet">
</head>
<style>
    .text_style{
        margin-bottom: 10px !important;
        border-style:none;
        background:rgba(0,0,0,0);
        text-align: center;
    }
    .title{
        padding: 40px;
        height: 100%;
        color: #fff;
    }
    .page{
        background-image: url("{{ URL::asset('h5/backimg.png') }}");
        background-repeat: round;
    }
    .getcode{
        display: inline-block;
        float:right;
        font-size: 10px;
        border-radius: 3.25rem;
        background:#ffffff;
        color:#9273FA;
        font-weight: 400;
        line-height: 1.5;
        padding: 0.375rem 0.75rem;
        border: 1px solid transparent;
        border-color: #9273FA;
    }
    .login-page .form-holder .info {
        background:rgba(251,251,251,0.6);
        color:#8F84D0;
    }

    .regbtn{
        width:80%;
        border-radius: 3.25rem;
        background: #9273FA;
    }
    .regbtn:hover {
        text-decoration: none;
        background-color: #9273FA;
        border-color: #9273FA;
    }

    .p-style span{
        font-weight: bold;
    }

    .logo{
        font-size: x-large;
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
                                <span>小茄+优惠券</span>
                            </div>
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
                                <input id="cell" class="input-material" type="text" maxlength="11" name="cell"
                                       placeholder="请输入手机号">
                                <div class="invalid-feedback">
                                    请确定手机号是否正确
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
                                <button id="login" type="button" name="login_submit" class="btn btn-primary regbtn">
                                    登录
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript files-->
<script src="{{ URL::asset('h5/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('h5/js/bootstrap.min.js') }}"></script>
<script>
    var time = 60;

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
        var flagCell = false;
        var flagCode = false;

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
        });

        $("#code").change(function () {
            var code = $("#code").val();
            if (code.length < 1 || code.length > 8) {
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
                    url: "{{url('auth/login/code')}}",
                    type: "POST",
                    data: {cell: cell},
                    success: function (result) {
                        console.log(result);
                        if (result.code != 0) {
                            alert(result.msg);
                            $('#getcode').attr("disabled", false);
                        }else{
                            //开始倒计时
                            waitTime(this);
                        }
                    }
                });


            }
        });

        $("#login").click(function () {
            if (!flagCell) {
                $("#cell").addClass("form-control is-invalid");
            }
            if (!flagCode) {
                $("#code").addClass("form-control is-invalid");
            }

            if (flagCell && flagCode) {
                var cell = $("#cell").val();
                var code = $('#code').val();
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                });

                $.ajax({
                    url: "{{url('auth/login')}}",
                    type: "POST",
                    data: {cell: cell, code: code},
                    success: function (result) {
                        console.log(result);
                        if (result.code != 200) {
                            alert(result.msg);
                        } else {
                            window.location.href="{{ url('/order/detail') }}";
                        }
                    }
                });
            }
        })
    })
</script>
</body>
</html>
