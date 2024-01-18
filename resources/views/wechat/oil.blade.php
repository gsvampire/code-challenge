<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>加油优惠券领取</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        header {
            height: 243px;
            width: 100%;
            background: url("{{ URL::asset('h5/header.png') }}") no-repeat center;
            background-size: 100% 100%;
        }

        .content {
            /*min-height: calc(100vh - 243px);*/
            font-family: Roboto, Roboto;
            background-color: #fff;
            margin-top: -60px;
            border-radius: 30px 30px 0 0;
            padding: 18px 0;
        }

        ul {

            width: 337px;
            margin: 0 auto;
        }

        li {
            background: url("{{ URL::asset('h5/card.png') }}") no-repeat center;
            height: 60px;
            background-size: 100% 100%;
            list-style: none;
            font-size: 16px;
            margin-top: 13px;
            padding: 18px 12px 15px 0px;
            display: flex;
            justify-content: space-between;
        }

        .li_l {
            line-height: 60px;
            color: #FF2C00;
            font-size: 18px;
            text-align: center;
            width: 90px;
        }

        span {
            font-size: 30px;
            font-weight: 700;
        }

        .li_c {
            font-family: Source Han Sans, Source Han Sans;
            display: flex;
            justify-content: space-between;
            flex-direction: column;

        }

        .li_c > p:nth-child(1) {
            font-size: 16px;
            font-weight: 500;
            color: #191919;
        }

        .li_c > p:nth-child(2) {
            font-size: 12px;
            font-weight: 400;
            color: #FF5A2D;
        }

        .li_c > p:nth-child(3) {
            font-size: 10px;
            font-weight: 400;
            color: #666666;
        }

        .li_r {
            width: 65px;
            height: 30px;
            margin: auto 0;
        }

        .li_r > img {
            height: 100%;
            width: 100%;
        }

        .btnAll {
            width: 337px;
            height: 60px;
            background: linear-gradient(270deg, #FF2C00 0%, #FA823F 100%);
            border-radius: 30px;
            margin: 0 auto;
            font-size: 18px;
            font-family: Source Han Sans, Source Han Sans;
            font-weight: 500;
            color: #FFFFFF;
            line-height: 60px;
            text-align: center;
            margin-top: 58px;

        }

        .info {
            width: 337px;
            height: 60px;
            background: #BEBEBE;
            border-radius: 30px;
            margin: 0 auto;
            font-size: 18px;
            font-family: Source Han Sans, Source Han Sans;
            font-weight: 500;
            color: #FFFFFF;
            line-height: 60px;
            text-align: center;
            margin-top: 58px;
            display: none;
        }

        footer {
            margin-top: 30px;
            padding: 19px 24px 27px 19px;
        }

        footer > p {
            font-size: 14px;
            font-family: Source Han Sans, Source Han Sans;
            font-weight: 400;
            color: #6B6B6B;
            line-height: 22px;
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

        .banner {
            height: 123px;
            width: 337px;
            margin: 0 auto;
            background: url("{{ URL::asset('h5/banner.png') }}") no-repeat center;
            background-size: 100% 100%;
        }
    </style>
</head>

<body>
<div class="order">
    <header></header>
    <div class="imgUrl">
        <img src="https://img01.yzcdn.cn/vant/custom-empty-image.png" alt="">
        <div>未查询到您的订单</div>

    </div>
    <div class="content">
        @if(!empty($url))
            <input type="hidden" name="jurl" id="jurl" value="{{ $url }}">
            <div class="banner" id="banner"></div>
        @endif
        <ul>
        </ul>
        <div class="button">
            <div class="btnAll">一键全部领取</div>
            <div class="info">已领取</div>
        </div>
    </div>
    <footer>
        <p style="font-weight: bold;">使用须知</p>
        <p>1.点击领取加油券按钮，领取后应用商店搜索并下载【能链团油】APP，购买权益同一手机号登录，在【我的】一【优惠券】即可看到优惠券；</p>
        <p>2.领取成功后，优惠券立即生效，优惠券有效期30天，请在有效期内使用，请注意过期时间，逾期作废不予补发；</p>
        <p>3.优惠券不能重复使用，不可退换，不可转让，不可拆分使用，不能与其他优惠叠加使用；</p>
        <p>4.如您在领取过程有其他问题，请联系客服进行协助处理；</p>
        <p>5.客服咨询：400-0389-566(工作日9:00-12:00 13:30-18:00)</p>
    </footer>
</div>
<script src="{{ URL::asset('h5/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('h5/js/message.js') }}"></script>
</body>
<script>
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
    let data = {
        list:<?php echo json_encode($data);?>,
        isAllLq: <?php echo $isFull;?>,
    }
    window.onload = function () {
        let ul = document.querySelector('ul')
        let imgUrl = document.querySelector('.imgUrl') // 无数据
        let content = document.querySelector('.content') // 有数据
        let btnAll = document.querySelector('.btnAll') // 可以选择
        let info = document.querySelector('.info') // 已全部领取
        let button = document.querySelector('.button') // 领取优惠券
        let {list, isAllLq} = data
        let idAll = [];
        let sellAll = [];
        if (data.list.length == 0) {
            content.style.display = 'none'
            imgUrl.style.display = 'block'
            button.style.display = 'none'
        }
        if (isAllLq && data.list.length) { // 如果全部都领取了且有数据
            btnAll.style.display = 'none'
            info.style.display = 'block'
        }
        for (let i = 0; i < list.length; i++) {
            idAll.push(list[i].id)
            sellAll.push(list[i].channel_sell_order_id)
            let li = document.createElement('li')
            li.innerHTML = `<div class="li_l"><span>${list[i].goods_price}</span>元</div>
                <div class="li_c">
                    <p>团油加油优惠券</p>
                    <p>${list[i].title}</p>
                    <p>订单有效期：${list[i].order_end_at}</p>
                </div>
                <div class="li_r">
                    ${list[i].is_received == 1 ? `<img src="{{ URL::asset('h5/ylq.png') }}" alt="">` : `<img src="{{ URL::asset('h5/btn.png') }}" alt="">`}
                </div>`
            ul.appendChild(li)
        }
        let buttons = document.querySelectorAll('.li_r')

        for (let i = 0; i < buttons.length; i++) {
            buttons[i].onclick = function () {
                let isLq = list[i].is_received || false
                if (isLq) {
                    alert('已领取成功，请前往应用商店搜索并下载【能链团油】APP登录并使用优惠券！');
                    return
                }
                var id = list[i].id;
                var sell_id = list[i].channel_sell_order_id;
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                });
                $.ajax({
                    url: "{{url('/oil/getCoupon')}}",
                    type: "POST",
                    data: {orderId: sell_id, detailId: id},
                    success: function (result) {
                        console.log(result);
                        if (result.code != 200) {
                            alert(result.msg);
                        } else {
                            alert({
                                title: '领取成功',
                                content: '您已领取成功！优惠券已发放，请前往应用商店搜索并下载【能链团油】APP登录并使用优惠券。',
                                doneText: '确定'
                            }).then(() => {
                                window.location.reload();
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        alert("网络错误，请重新提交");
                        window.location.reload();
                    }
                });
            }
        }
        btnAll.onclick = function () {
            var id = idAll.join(',');
            var sell_id = sellAll.join(',');
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
            });
            $.ajax({
                url: "{{url('/oil/getCoupon')}}",
                type: "POST",
                data: {orderId: sell_id, detailId: id},
                success: function (result) {
                    if (result.code != 200) {
                        alert(result.msg);
                    } else {
                        alert({
                            title: '领取成功',
                            content: '您已领取成功！优惠券已发放，请前往应用商店搜索并下载【能链团油】APP登录并使用优惠券。',
                            doneText: '确定'
                        }).then(() => {
                            window.location.reload();
                        });
                    }
                },
                error: function (xhr, status, error) {
                    alert("网络错误，请重新提交");
                    window.location.reload();
                }
            });
        }


        let banner = document.getElementById('banner') // 点击banner
        let jurl = document.getElementById('jurl').value

        banner.addEventListener('click', function () {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
            });
            $.ajax({
                url: "{{url('/oil/jump')}}",
                type: "POST",
                data: {},
                success: function (result) {
                    if (result.code != 200) {
                        alert(result.msg);
                    } else {
                        window.location.href = jurl;
                    }
                }
            });
        })

    }
</script>
</html>
