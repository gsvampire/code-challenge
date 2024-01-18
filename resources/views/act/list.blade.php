<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>权益随心选</title>
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
<script src="{{ URL::asset('h5/js/message.js') }}"></script>
<style>
    .group-div {
        text-align: right;
    }

    .card-title-1 {
        margin: 7px 0 0 0 !important;
    }

    .card {
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .page-content {
        padding: 0 !important;
    }

    .bannar_div_header {
        padding-right: 0;
        padding-left: 0;
        margin-bottom: 20px;
        background-color: #FE7E57;
        color: #fff;
    }

    .bannar_div {
        padding-right: 0;
        padding-left: 0;
    }

    .span_flex {
        width: 60%;
        height: 50px;
        position: absolute;
        bottom: 42%;
        left: 36%;
    }

    .span_flex-1 {
        height: 50px;
        position: absolute;
        bottom: 42%;
        left: 36%;
        width: 57%;
    }

    .font-rem {
        font-size: 26px;
        color: #ffffff;
    }

    .text-white {
        font-size: 18px;
        color: #ffffff;
    }

    .dd-flex {
        position: absolute;
        left: 8%;
    }

    .image-bak-1 {
        height: auto;
        width: 160px;
        overflow: hidden;
        margin-right: 20px;
    }

    @media (max-width: 540px) {

        .image-bak-1 {
            height: auto;
            width: 100px;
            overflow: hidden;
            margin-right: 20px;
        }
    }


    @media (max-width: 440px) {
        .span_flex {
            width: 180px;
            bottom: 26%;
        }
        .span_flex_11{
            width: 60%;
            bottom: 26%;
        }

        .font-rem {
            font-size: 15px;
        }

        .text-white {
            font-size: 12px;
        }

        .image-bak-1 {
            height: auto;
            width: 78px;
            overflow: hidden;
            margin-right: 20px;
        }

        .dd-flex {
            left: 10%;
        }

        .span_flex-1 {
            bottom: 26%;
        }
    }

    @media (max-width: 300px) {
        .font-rem {
            font-size: 8px;
        }
    }

</style>
<body>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-md-12 bannar_div_header">
                <div class="d-flex align-items-center div-icon">
                    <h5 class="font-size-17 card-title-1 mb-0 flex-grow-1"
                        style="text-align: center;color:#fff;">热门权益随心选</h5>
                </div>
            </div>
        </div>

        @if(!empty($data))
            @foreach($data as $key=>$value)
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="d-flex align-items-center pb_div @if($value['is_used']==0) click_div @endif"
                             data-id="{{ $value['id'] }}" data-time="{{ $value['order_start_at'] }}"
                             data-now="{{ $time }}">
                            @if($value['is_used'] == 1)
                                @if($key != 0)
                                    <img
                                        src="{{ URL::asset('pageImg/vip_used.png') }}"
                                        alt="" style="width:100%;height:auto;">
                                    <div class="d-flex align-items-center ">
                                        <div class="image-bak-1 dd-flex">
                                            <img
                                                src="{{ !empty($value['goods_icon']) ? URL::asset($value['goods_icon']) : URl::asset('pageImg/default2.png') }}"
                                                class="quan-img-2" alt="">
                                        </div>
                                        <div class="flex-grow-1 span_flex-1">
                                            <h5 class="mb-2 font-rem">{{ $value['goods_name'] }}</h5>
                                            <span class="text-white">有效期：{{ date('m.d',strtotime($value['order_start_at'])) }}-{{ date('m.d',strtotime($value['order_end_at'])) }}</span>
                                        </div>
                                    </div>
                                @else
                                    <img
                                        src="{{ URL::asset('pageImg/bg8.png') }}"
                                        alt="" style="width:100%;height:auto;">
                                    <div class="span_flex span_flex_11">
                                        <h5 class="font-rem">{{ $value['goods_name'] }}</h5>
                                        <span class="text-white">有效期：{{ date('m.d',strtotime($value['order_start_at'])) }}-{{ date('m.d',strtotime($value['order_end_at'])) }}</span>
                                    </div>
                                @endif
                            @else
                                <img src="{{ $key==0 ? URL::asset('pageImg/bg7.png'):URL::asset('pageImg/bg5.png') }}"
                                     alt="" style="width:100%;height:auto;">
                                <div class="span_flex">
                                    <h5 class="font-rem">{{ $value['goods_name'] }}</h5>
                                    <span class="text-white">有效期：{{ date('Y.m.d',strtotime($value['order_start_at'])) }}-{{ date('Y.m.d',strtotime($value['order_end_at'])) }}</span>
                                </div>
                            @endif
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
        $('.click_div').click(function () {
            var id = $(this).data('id');
            var time = $(this).data('time');
            var now = $(this).data('now');
            if (now <= time) {
                alert('未到领取时间');
            } else {
                window.location.href = "{{ url('/act/choose') }}/" + id;
            }
        });
    });

</script>
