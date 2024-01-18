<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>登录</title>
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
        background-image: url("{{ URL::asset('pageImg/bj1.png') }}");
        background-repeat: round;
        background-size: cover;
    }
    .getcode{
        display: inline-block;
        float:right;
        font-size: 10px;
        border-radius: 3.25rem;
        background:#ffffff;
        color:#FF7C17;
        font-weight: 400;
        line-height: 1.5;
        padding: 0.375rem 0.75rem;
        border: 1px solid transparent;
        border-color: #FF7C17;
    }
    .login-page .form-holder .info {
        background:rgba(251,251,251,0.6);
        color:#FF7C17;
    }

    .regbtn{
        width:80%;
        border-radius: 3.25rem;
        background: #FF7C17;
        background-image: linear-gradient(to right, #FF9043 , #FF5518);
    }
    .regbtn:hover {
        text-decoration: none;
        background-color: #FF7C17;
        border-color: #FF7C17;
    }

    .p-style span{
        font-weight: bold;
    }

    .logo{
        font-size: x-large;
        color:#FF7C17;
    }
    /* loading样式 */
    .loading{
        position: fixed;
        top:0;
        bottom: 0;
        right:0;
        left: 0;
        margin: auto;
        background: rgba(0,0,0,.7);
        display: none;
        z-index: 9999;
    }
    .loading_cont{
        position: absolute;
        top:50%;
        left: 50%;
        transform: translate(-50%,-50%);
        color: #fff;
    }
</style>
<body>
<!-- loading -->
<div class="loading">
    <div class="loading_cont">正在登录中...</div>
</div>
<div class="page login-page">
    <div class="container align-items-center">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="title align-items-center">
                        <div class="content">
                            <div class="logo">
                                <span>登录</span>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="form-holder has-shadow">
            <div class="row">
                <div class="col-xl-12 col-md-12">
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
                                <input id="code" class="input-material" maxlength="8" type="text" name="code" placeholder="验证码"
                                       style="width:50%;display: inline-block;">
                                <span id="getcode" name="getcode" class="getcode">发送验证码
                                </span>
                                <div class="invalid-feedback">
                                    验证码不能为空
                                </div>
                            </div>

                            <div class="form-group" style="text-align: center;">
                                <button id="login" type="button" style="color:white;width: 100%;" name="login_submit" class="btn btn-primary-1 regbtn">
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
    var clickBtn = false;
    //等待时间
    function waitTime(option) {
        if (time == 0) {
            clickBtn = false;
            $('#getcode').attr("disabled", false);
            $('#getcode').text('获取验证码');
            time = 60;
        } else {
            clickBtn = true;
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
            if(clickBtn){
                return false;
            }
            clickBtn = true;
            $("#code").attr("required", true);
            $('#getcode').attr("disabled", true);
            var cell = $("#cell").val();
            var reg = /^1[3456789]\d{9}$/;

            if (!reg.test(cell)) {
                alert('请确认手机号是否填写正确');
                clickBtn = false;
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
                            clickBtn = false;
                            alert(result.msg);
                            $('#getcode').attr("disabled", false);
                        }else{
                            //开始倒计时
                            waitTime(this);
                        }
                    },
                    error: function (xhr, status, error) {
                        alert("网络错误，请重新提交");
                        window.location.reload();
                    }
                });
            }
        });

        $("#login").click(function () {
            let loading = document.querySelector('.loading')
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
                        loading.style.display = 'block'
                        if (result.code != 200) {
                            alert(result.msg);
                            loading.style.display = 'none'
                        } else {
                            window.location.href="{{ url('/move/detail') }}";
                        }
                    },
                    error: function (xhr, status, error) {
                        alert("网络错误，请重新提交");
                        window.location.reload();
                    }
                });
            }
        })
    })
</script>
</body>
</html>
