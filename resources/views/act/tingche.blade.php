<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>停车券</title>
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
        bottom: 4%;
        left: 39%;
    }

    .text-muted {
        font-size: 18px;
    }

    @media (max-width: 440px) {
        .span_flex {
            width: 200px;
            left: 35%;
        }

        .text-muted {
            font-size: 12px;
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
                        style="text-align: center;color:#fff;">停车券</h5>
                </div>
            </div>
        </div>

        @if(!empty($data))
            @foreach($data as $key=>$value)
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="d-flex align-items-center pb_div @if($value['is_used']==0) click_div @endif"
                             data-id="{{ $value['id'] }}" data-time="{{ $value['order_start_at'] }}" data-now="{{ $time }}">
                            @if($value['is_used'] == 1)
                                <img src="{{ URL::asset('pageImg/used.png') }}" alt="" style="width:100%;height:auto;">
                            @else
                                <img src="{{ URL::asset('pageImg/bg4.png') }}" alt=""
                                     style="width:100%;height:auto;">
                            @endif
                            <div class="span_flex">
                        <span
                            class="text-muted">有效期：{{ date('Y-m-d',strtotime($value['order_start_at'])) }}至{{ date('Y-m-d',strtotime($value['order_end_at'])) }}</span>
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
                                ---- 暂无可用停车券 ---- <br>
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
            if ($(this).hasClass('disabled')) return false;
            $(this).attr("disabled", true);

            var id = $(this).data('id');
            var time = $(this).data('time');
            var now = $(this).data('now');
            if(now <= time){
                alert('未到领取时间');
                return false;
            }


            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
            });
            $.ajax({
                url: "{{url('/act/getTicket')}}",
                type: "POST",
                data: {order_detail_id: id},
                success: function (result) {
                    if (result.code != 200) {
                        alert(result.msg);
                        $(this).attr("disabled", false);

                        //window.location.reload();
                    } else {
                        alert('领取成功,请至捷停车小程序或者公众号查看使用。');
                        window.location.reload();
                    }
                },
                error: function (xhr, status, error) {
                    alert("网络错误，请重新提交");
                    window.location.reload();
                }
            });

        });
    });

</script>
