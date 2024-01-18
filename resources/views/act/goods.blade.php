<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>权益N选一</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ URL::asset('h5/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/style.default.css').'?'.microtime() }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/bootstrap.min.detail.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/app.min.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/icons.min.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/lyy.css').'?'.microtime() }}">
</head>
<script src="{{ URL::asset('h5/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('h5/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('h5/js/message.js') }}"></script>

<style>
    .card-title-1 {
        margin: 7px 0 0 0 !important;
    }

    .card {
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .price {
        font-size: 20px;
    }

    .card-div {
        background-image: url("{{ URL::asset('pageImg/vip_div.png') }}");
        background-repeat: round;
        background-size: cover;
        background-color: #fff0 !important;
    }

    .money-box {
        font-family: AlibabaPuHuiTi-Regular;
        font-size: .71875rem;
        letter-spacing: .03125rem;
        color: #d16e2b;
        position: relative;
    }

    .page-content {
        padding: 0 !important;
    }

    .bannar_div {
        padding-right: 0;
        padding-left: 0;
        margin-bottom: 20px;
        background-color: #FE7E57;
        color: #fff;
    }

    .form-btn {
        background-color: #E8AC65;
        border-color: #F6D39D;
        border-radius: 10px;
        float: right;
        font-weight: 500;
        background: linear-gradient(90deg, #E8AC65 0%, #F6D39D 100%);
    }

    .image-bak-1 {
        height: 6rem;
        width: 6rem;
        overflow: hidden;
        min-width: 84px;
    }

    .group-div {
        padding-left: 19px;
    }

    .time-div {
        font-family: Source Han Sans CN-Medium, Source Han Sans CN;
        font-weight: 500;
        color: #85674F;
    }

    .text-btn {
        font-family: Source Han Sans CN-Medium, Source Han Sans CN;
        font-weight: 500;
        color: #56381F;
    }

    .div-img {
        max-width: 38px;
        margin: 5px;
    }
</style>
<body>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-md-12 bannar_div">
                <div class="d-flex align-items-center">
                    <a href="{{ url('/act/detail/2') }}">
                        <img src="{{ URL::asset('pageImg/back.png') }}" class="div-img"></a>
                    <h5 class="font-size-17 card-title-1 mb-0 flex-grow-1"
                        style="text-align: center;color:#fff;">热门权益N选一</h5>
                </div>
            </div>
        </div>
        <input type="hidden" class="order_id" value="{{ $order_id }}">
        @if(!empty($data))
            @foreach($data as $key=>$value)
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card card-div">
                            <div class="d-flex align-items-center pb_div goods_pb_div" data-id="{{ $value['id'] }}"
                                 data-sku="{{ $value['sku_id'] }}" data-name="{{ $value['goods_name'] }}"
                                 data-no="{{ $value['goods_no'] }}">
                                <div class="image-bak-1">
                                    <img
                                        src="{{ !empty($value['goods_icon']) ? URL::asset($value['goods_icon']) : URl::asset('pageImg/default2.png') }}"
                                        class="quan-img-2" alt="" style="height:auto;">
                                </div>
                                <div class="flex-grow-1 group-div">
                                    <h5 class="font-size-15 mb-2" style="margin-top: 1.5rem;"></h5>
                                    <h5 class="font-size-15 mb-2 text-dark">{{ $value['goods_name'] }}</h5>
                                    <h5 class="font-size-14 mb-2">
                                    <span class="time-div">
                                        有效期：{{ date('Y-m-d',strtotime($order_start_at)) }} 至 {{ date('Y-m-d',strtotime($order_end_at)) }}</span><br>
                                    </h5>
                                    <div style="text-align: right;height: 36px;">
                                    <span class="text-dark" style="padding:5px 30px 5px 0;">￥<span
                                            class="price">{{ $value['goods_price'] }}/月</span></span>

                                        <button class="btn btn-primary btn-primary-1 card-link form-btn"
                                                data-id="{{ $value['id'] }}"><span class="text-btn">免费领取</span>
                                        </button>

                                    </div>

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
                            <p class="align-items-center" style="text-align: center;">
                                ---- 暂无相应的权益可以领取 ---- <br>
                                &nbsp;<br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
</body>
</html>
<script>
    $(function () {
        $('.goods_pb_div').click(function () {
            var order_id = $('.order_id').val();
            var id = $(this).data('id');
            var sku = $(this).data('sku');
            var name = $(this).data('name');
            var no = $(this).data('no');
            confirm({
                title: '提示',
                content: '确定选择' + name + '领取吗？',
                doneText: '确认',
                cancalText: '取消'
            }).then(() => {
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                });
                $.ajax({
                    url: "{{url('/act/postVipMember')}}",
                    type: "POST",
                    data: {order_detail_id: order_id, goods_id: id, sku_id: sku, goods_no: no},
                    success: function (result) {
                        console.log(result);
                        if (result.code != 200) {
                            alert(result.msg);
                            //window.location.reload();
                        } else {
                            alert('领取成功，请留意充值账户变动。');
                            window.location.href = "{{ url('/act/detail/2') }}";
                        }
                    },
                    error: function (xhr, status, error) {
                        alert("网络错误，请重新提交");
                        window.location.reload();
                    }
                });
            }).catch(() => {
                console.log('已取消');
            });
        });
    });

</script>
