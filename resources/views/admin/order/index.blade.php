<style>
    .padd {
        padding-bottom: 10px;
    }

    .box-header, .box-body {
        padding: 10px 10px 2px;
    }

    .form-group {
        margin-bottom: 0;
    }
</style>
<div class="card dcat-box">
    <div class="box-header with-border">
        <h3 class="box-title" style="line-height:30px;font-size: 2rem!important">{{ $month }}月订单前3名</h3>
    </div>
    <div class="box-header with-border">
        <h3 class="box-title" style="line-height:30px;font-size: 18px;color:#1d81cc;">兑换码</h3>
    </div>
    <div class="box-body">
        <div class="form-horizontal mt-1">
            <div class="show-field form-group row" style="font-size: 16px;">
                @if(!empty($list))
                    @foreach($list as $k=>$item)
                        <div class="col-sm-8 padd">
                            <span>（{{ $k+1 }}）&nbsp;{{ $item['goods_name'] }}【{{ $item['sku'] }}】</span>
                        </div>
                        <div class="col-sm-4 padd">
                            <span>{{ $item['total'] }}</span>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@if(!empty($list4))
    <div class="card dcat-box">
        <div class="box-header with-border">
            <h3 class="box-title" style="line-height:30px;font-size: 18px;color:#1d81cc;">兑换码兑换</h3>
        </div>
        <div class="box-body">
            <div class="form-horizontal mt-1">
                <div class="show-field form-group row" style="font-size: 16px;">

                    @foreach($list4 as $k=>$item)
                        <div class="col-sm-8 padd">
                            <span>（{{ $k+1 }}）&nbsp;{{ $item['goods_name'] }}【{{ $item['sku'] }}】</span>
                        </div>
                        <div class="col-sm-4 padd">
                            <span>{{ $item['total'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
@if(!empty($list1))
    <div class="card dcat-box">
        <div class="box-header with-border">
            <h3 class="box-title" style="line-height:30px;font-size: 18px;color:#1d81cc;">券包</h3>
        </div>
        <div class="box-body">
            <div class="form-horizontal mt-1">
                <div class="show-field form-group row" style="font-size: 16px;">
                    @foreach($list1 as $k=>$item)
                        <div class="col-sm-8 padd">
                            <span>（{{ $k+1 }}）&nbsp;{{ $item['goods_name'] }}【{{ $item['sku'] }}】</span>
                        </div>
                        <div class="col-sm-4 padd">
                            <span>{{ $item['total'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
@if(!empty($list2))
    <div class="card dcat-box">
        <div class="box-header with-border">
            <h3 class="box-title" style="line-height:30px;font-size: 18px;color:#1d81cc;">直冲</h3>
        </div>
        <div class="box-body">
            <div class="form-horizontal mt-1">
                <div class="show-field form-group row" style="font-size: 16px;">
                    @foreach($list2 as $k=>$item)
                        <div class="col-sm-8 padd">
                            <span>（{{ $k+1 }}）&nbsp;{{ $item['goods_name'] }}【{{ $item['sku'] }}】</span>
                        </div>
                        <div class="col-sm-4 padd">
                            <span>{{ $item['total'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
@if(!empty($list3))
    <div class="card dcat-box">
        <div class="box-header with-border">
            <h3 class="box-title" style="line-height:30px;font-size: 18px;color:#1d81cc;">二次支付</h3>
        </div>
        <div class="box-body">
            <div class="form-horizontal mt-1">
                <div class="show-field form-group row" style="font-size: 16px;">

                    @foreach($list3 as $k=>$item)
                        <div class="col-sm-8 padd">
                            <span>（{{ $k+1 }}）&nbsp;{{ $item['goods_name'] }}【{{ $item['sku'] }}】</span>
                        </div>
                        <div class="col-sm-4 padd">
                            <span>{{ $item['total'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
