<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的订单</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .order {
        background-color: #F2F2F2;
        height: 100vh;
    }

    .content {
        padding: 20px 15px;
        font-family: Source Han Sans CN, Source Han Sans CN;
    }

    li {
        background-color: #fff;
        border-radius: 15px;
        list-style: none;
        padding: 15px;
        font-size: 15px;
        margin-bottom: 10px;
    }

    .cont {
        display: flex;
        justify-content: space-between;
    }

    .top div {
        color: #FFA100;
    }

    .top {
        border-bottom: 1px solid #FAFAFA;
        height: 40px;
        line-height: 40px;
    }

    .center {
        height: 50px;
        line-height: 50px;
        color: #3D3D3D;
        font-size: 18px;
        font-weight: 500;
    }

    .border {
        padding: 10px 15px;
        border: 1px solid #eee;
        background: linear-gradient(90deg, #F4F7FD 0%, rgba(244, 247, 253, 0) 100%);
        border-radius: 9px;
        color: #171D2D;
        line-height: 24px;
        font-size: 15px;
        font-family: Roboto, Roboto;
        margin-bottom: 10px;

    }

    .link {
        word-break: break-all;
        font-size: 12px;
        line-height: 24px;
    }

    .bottom {
        height: 30px;
        line-height: 30px;
        font-size: 13px;
        font-family: Source Han Sans CN, Source Han Sans CN;
        font-weight: 350;
        color: #5A6171;
    }

    .button {
        padding: 0 30px;
        font-size: 20px;
        border: 1px solid #118CFF;
        height: 32px;
        line-height: 32px;
        text-align: center;
        font-weight: 500;
        color: #118CFF;
        border-radius: 24px;
        cursor: pointer;
    }

    .tip {
        list-style: none;
        padding: 15px;
        font-size: 15px;
        margin-bottom: 10px;
        text-align: center;
    }
</style>
<body>
<div class="order">
    <ul class="content">
    </ul>

    <div class="tip">
        如有问题请咨询客服：400-0389-566 周一至周五 9:30-18:00
    </div>
</div>
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
    // 模拟数据
    let list = <?php echo json_encode($data);?>

        window.onload = function () {
        //容器
        let content = document.querySelector('.content')
        for (let i = 0; i < list.length; i++) {
            let li = document.createElement('li')
            let borderHtml;
            console.log(list[i].is_link)
            if (list[i].is_link || list[i].kami_pass != '' || list[i].kami_no != '') {
                if (list[i].is_link) {
                    borderHtml = `<div class="border">
            <div class="link"><a href="${list[i].link_url}">${list[i].link_url}</a></div>
                </div>`
                } else if (list[i].kami_pass != '' && list[i].kami_no != '') {
                    borderHtml = `<div class="border">
            <div>卡号：${list[i].kami_no}</div>
                    <div>卡密：${list[i].kami_pass}</div>
                </div>`
                } else {
                    borderHtml = `<div class="border">
                    <div>券码：${list[i].kami_pass}</div>
                </div>`
                }
                li.innerHTML = `
            <div class="top cont">
                    <div>订单编号：${list[i].order_no}</div>
                    <div>${list[i].order_status}</div>
                </div>
                <div class="center cont">
                     <div>${list[i].goods_name}${list[i].goods_price}元券</div>
                     <div>${list[i].sell_goods_price}</div>
                </div>
                 ${borderHtml}
            <div class="bottom cont">
                    <div>过期时间: ${list[i].kami_time}</div>
                    <div class="button">复制</div>
                </div>`
                content.appendChild(li)
            }
        }
        let buttons = document.querySelectorAll('.button')

        for (let i = 0; i < buttons.length; i++) {
            buttons[i].onclick = function () {

                let text = "";
                let borerChild = this.parentNode.parentNode.querySelector('.border').children
                for (let i = 0; i < borerChild.length; i++) { // 获取border下的所有子元素
                    // console.log(borerChild[i].innerText)
                    text += borerChild[i].innerText
                    copy(text)
                }

            }
        }

        function copy(textValue) {
            // 动态创建 textarea 标签
            const textarea = document.createElement('textarea')
            // 将该 textarea 设为 readonly 防止 iOS 下自动唤起键盘，同时将 textarea 移出可视区域
            textarea.readOnly = 'readonly'
            textarea.style.position = 'absolute'
            textarea.style.left = '-9999px'
            // 将要 copy 的值赋给 textarea 标签的 value 属性
            textarea.value = textValue
            // 将 textarea 插入到 body 中
            document.body.appendChild(textarea)
            // 选中值并复制
            textarea.select()
            const result = document.execCommand('Copy')

            document.body.removeChild(textarea)
        }
    }


</script>
</html>
