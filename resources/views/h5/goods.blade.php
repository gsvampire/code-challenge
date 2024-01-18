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
    <link rel="stylesheet" href="{{ URL::asset('h5/css/style.default.css').'?'.microtime() }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/bootstrap.min.detail.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/app.min.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/icons.min.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/lyy.css').'?'.microtime() }}">
</head>
<script src="{{ URL::asset('h5/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('h5/js/bootstrap.min.js') }}"></script>
<style>
    .is-check {
        border-color: #FF9043;
        padding-right: 2.25rem;
        background-repeat: no-repeat;
        background-position: center right calc(2.25rem / 4);
        background-size: calc(2.25rem / 2) calc(2.25rem / 2);
        background-image: url("{{ URL::asset('pageImg/27.png') }}");
    }

    .form-floating > .form-control:focus, .form-floating > .form-control:not(:placeholder-shown) {
        padding-top: 0;
        padding-bottom: 0;
    }

    .form-floating-icon {
        margin-left: 10px;
        margin-right: 10px;
    }

    .form-floating-custom > .form-control, .form-floating-custom > .form-select {
        padding-left: 85px;
    }

    .f-div {
        background-image: url("{{ URL::asset('pageImg/quan.png') }}");
        background-size: contain;
        background-repeat: round;
        text-align: center;
        min-width: 120px;
        min-height: 150px;
        max-width: 240px;
        margin-right: 5px;
    }
    .flex-span {
        bottom: -33px;
        position: relative;
    }
</style>
<body>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <!-- card -->
                <div class="card card-h-100 card-div">
                    <img class="bannar" src="{{ URL::asset('pageImg/26.png') }}" alt="">
                </div>
            </div>
        </div>
        {{--福利--}}
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card card-h-100 card-div">
                    <div class="d-flex align-items-center div-icon">
                        <img src="{{ URL::asset('pageImg/check.png') }}" class="div-icon-img">
                        <h5 class="card-title mb-0 flex-grow-1">超级好券限时领--后期预留位置</h5>
                    </div>
                    <div class="d-flex flex-div">
                        <div class="card f-div">
                            <div class="card-body align-items-center flex-span">
                                <h5 class="card-title">打车劵</h5>
                                <p class="card-text text-dark">6元</p>
                                <h4 class="card-text">
                                    <small class="text-white">立即领取</small>
                                </h4>
                            </div>
                        </div>
                        <div class="card f-div">
                            <div class="card-body align-items-center flex-span">
                                <h5 class="card-title">打车劵</h5>
                                <p class="card-text text-dark">6元</p>
                                <h4 class="card-text ">
                                    <small class="text-white">立即领取</small>
                                </h4>
                            </div>
                        </div>
                        <div class="card f-div">
                            <div class="card-body align-items-center flex-span">
                                <h5 class="card-title">打车劵</h5>
                                <p class="card-text text-dark">6元</p>
                                <h4 class="card-text">
                                    <small class="text-white">立即领取</small>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card  card-div">
                    <div class="card-body card-div-1">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="font-size-15 mb-1">
                                    <span class="text-dark">{{ $value['goods_name'] ?? '' }}</span><br>
                                </h5>
                            </div>
                            <div class="image-lg">
                                <img
                                    src="{{ !empty($value['goods_icon']) ? URL::asset($value['goods_icon']) : URl::asset('pageImg/default.png') }}"
                                    class="quan-img-1" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="card-body card-div-2">
                        <h5 class="card-text font-size-15">{{ $value['sku'] ?? '' }}</h5>
                        <span class="card-text price_text">￥<span
                                class="price">{{ $value['sell_goods_price'] ?? 0 }}</span>元</span>
                        <span class="text-muted" style="text-decoration: line-through">￥{{ $value['goods_price'] ?? 0 }}元</span>
                        <button class="btn btn-primary btn-primary-1 card-link link-btn modal-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#myModal" id="modal-btn" data-id="{{ $value['id'] ?? 0 }}"
                                data-price="{{ $value['sell_goods_price'] ?? 0 }}">立即开通
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{--抢购类的--}}
        <div class="qianggou">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="d-flex align-items-center div-icon">
                        <img src="{{ URL::asset('pageImg/v.png') }}" class="div-icon-img">
                        <h4 class="card-title mb-0 flex-grow-1">超值会员抢购--后期预留位置</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-3 col-sm-6">
                    <div class="card  card-div">
                        <div class="card-body card-div-1">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="font-size-15 mb-1">
                                        <span class="text-dark">精选会员<br>实力放价</span>
                                    </h5>
                                </div>
                                <div class="image-lg">
                                    <img src="{{ URL::asset('pageImg/logo.png') }}"
                                         class="quan-img-1" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-text font-size-15">网易云</h5>
                            <span class="card-text price_text">￥<span
                                    class="price">6</span>元</span>
                            <span class="text-muted" style="text-decoration: line-through">￥10元</span>
                            <button class="btn btn-primary card-link link-btn">立即开通</button>
                        </div>
                    </div>

                    <div class="card  card-div">
                        <div class="card-body card-div-1">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="font-size-15 mb-1">
                                        <span class="text-dark">精选会员<br>实力放价</span>
                                    </h5>
                                </div>
                                <div class="image-lg">
                                    <img src="{{ URL::asset('pageImg/logo.png') }}"
                                         class="quan-img-1" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-text font-size-15">网易云</h5>
                            <span class="card-text price_text">￥<span
                                    class="price">6</span>元</span>
                            <span class="text-muted" style="text-decoration: line-through">￥10元</span>
                            <button class="btn btn-primary card-link link-btn">立即开通</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xs-3 col-sm-6">
                    <div class="card  card-div">
                        <div class="card-body card-div-1">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="font-size-15 mb-1">
                                        <span class="text-dark">精选会员<br>实力放价</span>
                                    </h5>
                                </div>
                                <div class="image-lg">
                                    <img src="{{ URL::asset('pageImg/logo.png') }}"
                                         class="quan-img-1" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-text font-size-15">网易云</h5>
                            <span class="card-text price_text">￥<span
                                    class="price">6</span>元</span>
                            <span class="text-muted" style="text-decoration: line-through">￥10元</span>
                            <button class="btn btn-primary card-link link-btn">立即开通</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xs-3 col-sm-6">
                    <div class="card  card-div">
                        <div class="card-body card-div-1">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="font-size-15 mb-1">
                                        <span class="text-dark">精选会员<br>实力放价</span>
                                    </h5>
                                </div>
                                <div class="image-lg">
                                    <img src="{{ URL::asset('pageImg/logo.png') }}"
                                         class="quan-img-1" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-text font-size-15">网易云</h5>
                            <span class="card-text price_text">￥<span
                                    class="price">6</span>元</span>
                            <span class="text-muted" style="text-decoration: line-through">￥10元</span>
                            <button class="btn btn-primary card-link link-btn">立即开通</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{--自己购买的券包--}}
        <div class="quanbao">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card card-h-100 card-div">
                        <div class="d-flex align-items-center pb_div">
                            <div class="image-bak">
                                <img src="{{ URL::asset('pageImg/logo.png') }}"
                                     class="quan-img-2" alt="">
                            </div>
                            <div class="flex-grow-1 group-div">
                                <h5 class="font-size-15 mb-2">超值网易云音乐会员</h5>
                                <h5 class="font-size-14 mb-2">
                                    <span class="text-muted">黄金会员 年卡</span>
                                </h5>
                                <span class="text-muted price_text">￥<span
                                        class="price">17</span>元</span>
                                <span class="text-muted" style="text-decoration: line-through">￥35元</span>
                                <button class="btn  btn-primary btn-primary-1 card-link link-btn modal-btn" data-bs-toggle="modal"
                                        data-bs-target="#myModal">立即开通</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12">

                    <div class="card card-h-100 card-div">
                        <div class="d-flex align-items-center pb_div">
                            <div class="image-bak">
                                <img src="{{ URL::asset('pageImg/logo.png') }}"
                                     class="quan-img-2" alt="">
                            </div>
                            <div class="flex-grow-1 group-div">
                                <h5 class="font-size-15 mb-2">超值网易云音乐会员</h5>
                                <h5 class="font-size-14 mb-2">
                                    <span class="text-muted">黄金会员 月卡</span>
                                </h5>
                                <span class="text-muted price_text">￥<span
                                        class="price">17</span>元</span>
                                <span class="text-muted" style="text-decoration: line-through">￥35元</span>
                                <button class="btn  btn-primary btn-primary-1 card-link link-btn modal-btn" data-bs-toggle="modal"
                                        data-bs-target="#myModal">立即开通</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-bs-scroll="true"
             aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">选择支付方式</h5>
                        <button type="button" class="btn-close close-btn" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="payname" id="weixin">
                            <label class="form-check-label" for="weixin">
                                微信支付
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="payname" id="zhifubao">
                            <label class="form-check-label" for="zhifubao">
                                支付宝支付
                            </label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect close-btn" data-bs-dismiss="modal">
                            关闭
                        </button>
                        <button type="button" class="btn btn-primary waves-effect waves-light">立即支付</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="footer_btn">
        <div class="form-floating form-floating-custom input-bot">
            <input type="text" class="form-control is-check" placeholder="充值账号" value="13222222222">
            <div class="form-floating-icon">
                <span for="input-username" style="color:#FF9043;">充值账号</span>
            </div>
        </div>
    </div>
</div>


</body>
</html>
<script>
    $(function () {
        $('.modal-btn').click(function () {
            $('#myModal').modal();
        });
        $('.close-btn').click(function () {
            $('#myModal').modal('hide');
        });

    });
</script>


{{--<div class="row">
    <div class="col-xl-12 col-md-12">
        <!-- card -->
        <div class="card card-h-100 card-div">
            <div class="d-flex align-items-center div-icon">
                <img src="{{ URL::asset('pageImg/check.png') }}">
                <h4 class="card-title mb-0 flex-grow-1">超级好券限时领--后期预留位置</h4>
            </div>


            <div class="d-flex flex-div">
                <div class="card-body col-xl-6 col-md-6 flex-div-1">
                    <img src="{{ URL::asset('pageImg/quan.png') }}" class="quan-img">
                    <div class="float-div">
                        <h5 class="font-size-15 mb-1 float-div-1">
                            <span class="text-dark"></span>
                        </h5>
                        <h5 class="font-size-12 mb-1 float-div-2">
                            <span class="text-dark"></span>
                        </h5>

                        <span class="text-dark float-div-3">免费领取</span>
                    </div>
                </div>
                <div class="clearfix visible-xs-block"></div>
                <div class="card-body col-xl-6 col-md-6 flex-div-1">
                    <img src="{{ URL::asset('pageImg/quan.png') }}" class="quan-img">
                    <div class="float-div">
                        <h5 class="font-size-15 mb-1 float-div-1">
                            <span class="text-dark"></span>
                        </h5>
                        <h5 class="font-size-12 mb-1 float-div-2">
                            <span class="text-dark"></span>
                        </h5>

                        <span class="text-dark float-div-3">免费领取</span>
                    </div>
                </div>
                <div class="clearfix visible-xs-block"></div>
                <div class="card-body col-xl-6 col-md-6 flex-div-1">
                    <img src="{{ URL::asset('pageImg/quan.png') }}" class="quan-img">
                    <div class="float-div">
                        <h5 class="font-size-15 mb-1 float-div-1">
                            <span class="text-dark"></span>
                        </h5>
                        <h5 class="font-size-12 mb-1 float-div-2">
                            <span class="text-dark"></span>
                        </h5>

                        <span class="text-dark float-div-3">免费领取</span>
                    </div>
                </div>
                <div class="clearfix visible-xs-block"></div>
            </div>
        </div>
    </div>
</div>--}}
