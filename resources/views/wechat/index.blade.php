<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>恭喜您，收到一个加油福利！</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
    }

    .main {
        min-height: 100vh;
        width: 100vw;
        background: url("{{ URL::asset('h5/wechat_bj.png') }}") no-repeat center;
        background-size: 100% 100%;
    }

    .button {
        position: fixed;
        width: 279px;
        height: 51px;
        background: #FFF8A7;
        border-radius: 49px;
        font-size: 28px;
        font-family: Source Han Sans, Source Han Sans;
        font-weight: 500;
        color: #FF0000;
        line-height: 50px;
        text-align: center;
        left: 0;
        right: 0;
        margin: 0 auto;
        bottom: 200px;
        animation: move 2s linear infinite;
    }

    @keyframes move {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(.9);
        }
        100% {
            transform: scale(1);
        }
    }

    .dialog {
        position: fixed;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.5);
    }

    .login {
        position: absolute;
        background: url("{{ URL::asset('pageImg/bj1.png') }}") no-repeat center;
        background-size: 100% 100%;
        padding: 20px;
        width: 80%;
        left: 5%;
        top: 50%;
        transform: translateY(-50%);
        border-radius: 20px;
    }

    .close {
        position: absolute;
        color: #fff;
        right: 20px;
        top: -40px;
        font-size: 30px;
    }

    h3 {
        padding: 30px;
    }

    .input {
        padding: 10px 0;
        width: 90%;
        margin: 0 auto;
        display: flex;
    }

    input {
        border: none;
        border-bottom: 1px solid #eee;
        height: 40px;
        line-height: 40px;
        font-size: 16px;
        background: #F7F8FA;
        border-radius: 50px;
        font-family: OPPOSans, OPPOSans;
        padding: 0 20px;
        font-weight: 400;
        outline: none;
    }

    .int1, .int2 {
        width: 100%;
        position: relative;

    }

    .send {
        position: absolute;
        z-index: 1;
        right: 60px;
        font-size: 16px;
        font-family: OPPOSans, OPPOSans;
        font-weight: 400;
        color: #FF7C17;
        line-height: 40px;
    }

    .btn {
        margin: 0 auto;
        margin-top: 40px;
        width: 330px;
        height: 60px;
        background: linear-gradient(270deg, #FF2C00 0%, #FA823F 100%);
        border-radius: 30px;
        text-align: center;
        line-height: 60px;
        font-size: 16px;
        color: #fff;

    }

    /* loading样式 */
    .loading {
        position: fixed;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        margin: auto;
        background: rgba(0, 0, 0, .7);
        display: none;
        z-index: 9999;
    }

    .loading_cont {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
    }

</style>
<body>
<!-- loading -->
<div class="loading">
    <div class="loading_cont">正在登录中...</div>
</div>
<div class="main">
    <div class="button">领取加油优惠券</div>
</div>

<!-- 弹框 -->
<div class="dialog" id="dialog" style="display: none;">

    <div class="login">
        <div class="close">x</div>
        <h3>用户登录</h3>
        <div class="input">
            <input type="text" class="int1" maxlength="11" placeholder="请输入手机号" id="cell"></input>
        </div>
        <div class="input">
            <input type="text" class="int2" maxlength="6"  placeholder="请输入验证码" id="code">
            <span class="send" id="getcode">获取验证码</span>
        </div>
        <div class="btn">登录</div>
    </div>
</div>
<script src="{{ URL::asset('h5/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('h5/js/message.js') }}"></script>
</body>
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

    let isLogin = {{ $isLogin }} // 是否登录
        window.onload = function () {
            let send = document.querySelector('.send');
            let button = document.querySelector('.button');
            let main = document.querySelector('.main');
            let dialog = document.getElementById('dialog');
            let close = document.querySelector('.close');
            let btn = document.querySelector('.btn');
            close.onclick = function (e) {
                dialog.style.display = 'none'
                main.style.display = 'block'
            }

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


            button.addEventListener('click', function () {
                if (isLogin == 1) {
                    window.location.href = "{{ url('/wxpage/oil/list') }}";
                } else {
                    dialog.style.display = 'block';
                    // main.style.display = 'none';
                }
            })
            send.addEventListener('click', function () {
                if (clickBtn) {
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
                        headers: {'X-CSRF-TOKEN': "<?php echo csrf_token();?>"}
                    });

                    $.ajax({
                        url: "{{url('auth/login/code')}}",
                        type: "POST",
                        data: {cell: cell},
                        success: function (result) {
                            if (result.code != 0) {
                                clickBtn = false;
                                alert(result.msg);
                                $('#getcode').attr("disabled", false);
                            } else {
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
            })
            btn.addEventListener('click', function () {
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
                            loading.style.display = 'block'
                            if (result.code != 200) {
                                alert(result.msg);
                                loading.style.display = 'none'
                            } else {
                                window.location.href = "{{ url('/wxpage/oil/list') }}";
                            }
                        },
                        error: function (xhr, status, error) {
                            alert("网络错误，请重新提交");
                            window.location.reload();
                        }
                    });
                }
            })


        }
</script>
</html>
