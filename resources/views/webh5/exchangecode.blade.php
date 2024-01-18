<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <title>权益兑换</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .order {
            /* min-height: 100vh; */
            background: url("{{ URL::asset('pageImg/bj.png') }}") no-repeat center;
            background-size: 100% 100%;
            background-attachment: fixed;
            padding-bottom: 20px;
        }

        header {
            padding-top: 68px;
            text-align: center;
            font-size: 12px;
            font-family: Source Han Sans CN, Source Han Sans CN;
            font-weight: 400;
            color: #FFFFFF;
            line-height: 35px;
        }

        header > h3 {
            height: 75px;
            font-size: 50px;
            font-family: YouSheBiaoTiHei, YouSheBiaoTiHei;
            font-weight: 400;
            color: #FFFFFF;
            line-height: 75px;
            text-shadow: 0px 4px 10px rgba(254, 118, 22, 0.5);
        }

        .content {
            width: 340px;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            padding: 25px 17px;
            font-family: Source Han Sans CN, Source Han Sans CN;
        }

        .input {
            display: flex;
            margin-bottom: 30px;
            font-family: Source Han Sans CN, Source Han Sans CN;
            font-weight: 400;
            color: #737373;
            justify-content: space-between;

        }

        .input > input {
            border: none;
            outline: none;
            line-height: 41px;
            font-size: 14px;
            width: 100%;
            border-bottom: 1px solid #eeeeee;
        }

        .yzm {
            flex: 1;
            height: 35px;
            font-size: 12px;
            font-family: Source Han Sans CN, Source Han Sans CN;
            font-weight: 400;
            color: #FF7C17;
            line-height: 35px;
            text-align: center;
            border-radius: 20px;
            border: 1px solid #FF7C17;
        }

        #yzm {
            width: 200px;
        }

        .button {
            height: 50px;
            background: #FF7C17;
            border-radius: 25px;
            margin-top: 20px;
            line-height: 50px;
            font-size: 16px;
            font-family: OPPOSans, OPPOSans;
            font-weight: 500;
            color: #FFFFFF;
            text-align: center;
        }

        footer {
            width: 340px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 20px;
            border: 3px solid #FFFFFF;
            padding: 25px 17px;
            font-family: Source Han Sans CN, Source Han Sans CN;
            margin-bottom: 30px;
        }

        footer > p {
            font-size: 14px;
            font-weight: 400;
            color: #C07C41;
            line-height: 22px;
        }

        .marginbottom {
            margin-top: 30px;
        }

        .imgUrl {
            font-family: Roboto, Roboto;
            background-color: #fff;
            text-align: center;
            margin: 0 auto;
            margin-top: 30px;
            display: none;
        }

        .imgUrl > div {
            font-size: 20px;
            color: #666666;
        }

        .dialog {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.7);
            display: none;
        }

        .text {
            color: #FFFFFF;
            font-size: 15px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
<div class="order">
    <header>
        <h3>会员权益轻松换</h3>
        <span>请仔细核对账号，数字权益类产品无法退换，请仔细核对</span>
    </header>

    <div class="content">
        <div class="input"><input type="text" maxlength="18" placeholder="请输入兑换码" id="dhm"></div>
        <div class="input"><input type="tel" maxlength="11" placeholder="请输入手机号码" id="phone" name="cell"></div>
        <div class="input">
            <input type="text" maxlength="6" placeholder="请输入验证码" id="yzm"/>
            <div class="yzm" id="getcode">发送验证码</div>
        </div>
        <div class="button" id="submit">确认兑换</div>
    </div>
    <footer>
        <p>使用须知：</p>
        <p>1.请在有效期内兑换，逾期兑换将失效;</p>
        <p>2.兑换后若没有立即开通会员服务，可能是受系统网络影响请耐心等待1个工作日;</p>
        <p>3.您购买的万达影城电影票通用券，可在微信搜索“万达电影”小程序，使用兑换手机号登录，在“我的-我的资产-可用券”中查看到账情况、选座观影。</p>
        <p>4.您购买的瑞幸咖啡代金券，可在微信搜索“瑞幸咖啡”，使用兑换手机号登录，在“我的-咖啡钱包”中查看到账情况。</p>
        <p>5.在法律允许的范围内，本公司享有解释权。</p>
        <div class="marginbottom"></div>

        <p> 温馨提示：</p>
        <p> 1. 未在指定时间内兑换权益，而导致权益过期无法使用的，不支持售后。</p>
        <p>2. 如有疑问可拨打我们的客服专线400-0389-566，工作时间9:00-18:00。</p>
    </footer>
</div>
<script src="{{ URL::asset('h5/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('h5/js/message.js') }}"></script>
<!-- 兑换中提示 -->
<div class="dialog">
    <div class="text">正在兑换中请稍后</div>
</div>
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

    (function (n = 10) {
        const dEl = document.documentElement;

        function setRem() {
            const rem = dEl.clientWidth / n;
            dEl.style.fontSize = rem + 'px';
        }

        //初始化执行
        setRem()
        //视口大小变动时执行
        window.onresize = setRem
    })()
    window.onload = function () {
        // 兑换码18位触发
        let dhm = document.getElementById('dhm'); // 兑换码
        let phone = document.getElementById('phone'); // 手机号码
        let yzm = document.getElementById('yzm'); // 验证码
        let dialog = document.querySelector('.dialog'); // 兑换中提示
        let flagcode = false;
        let err = '';
        dhm.addEventListener('input', function () {
            if (dhm.value.length == 18) {
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                });

                $.ajax({
                    url: "{{url('/xqc/codeStatus')}}",
                    type: "POST",
                    data: {code: dhm.value},
                    success: function (result) {
                        if (result.code != 0) {
                            err = result.msg;
                            alert(result.msg);
                        } else {
                            flagcode = true;
                        }
                    },
                    error: function (xhr, status, error) {
                        alert("网络错误，请重新提交");
                        window.location.reload();
                    }
                });
            }
        })
        //获取验证码
        let send = document.querySelector('.yzm');
        send.addEventListener('click', function () {
            if (dhm.value.length == 0) {
                alert('请填写兑换码');
                return false;
            }
            if (!flagcode) {
                alert(err);
                return false;
            }
            if (clickBtn) {
                return false;
            }
            clickBtn = true;
            $("#yzm").attr("required", true);
            $('#getcode').attr("disabled", true);
            var cell = $("#phone").val();
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

        //    点击兑换
        let submit = document.getElementById('submit');
        submit.addEventListener('click', function () {
            if (!dhm.value) return alert('兑换码不能为空');
            if (!phone.value) return alert('手机号不能为空');
            if (!yzm.value) return alert('验证码不能为空');
            dialog.style.display = 'block';
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
            });

            $.ajax({
                url: "{{url('/xqc/convertTicket')}}",
                type: "POST",
                data: {mobile: phone.value, sms_code: yzm.value, change_code: dhm.value},
                success: function (result) {
                    alert(result.msg);
                    dialog.style.display = 'none';
                },
                error: function (xhr, status, error) {
                    alert("网络错误，请重新提交");
                    window.location.reload();
                }
            });
        })
    }
</script>
</html>
