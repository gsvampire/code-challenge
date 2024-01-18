<style>
    .form-group .control-label {
        text-align: left;
    }
</style>
<div class="content-body" id="app">
    <div class="row ">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card dcat-box">
                        <input type="hidden" id="refund_id" name="refund_id" value="{{ $data['id'] }}"/>
                        <div class="box-body">
                            <div class="form-horizontal mt-1">
                                <div class="show-field form-group row">
                                    <div class="col-sm-6 control-label">
                                        <span>退款订单编号: {{ $data['refund_order_no'] }}</span>
                                    </div>
                                    <div class="col-sm-6 control-label">
                                        <span>下单时间: {{ $data['order_created_at'] }}</span>
                                    </div>

                                </div>
                                <div class="show-field form-group row">
                                    <div class="col-sm-6 control-label">
                                        <span>订单编号: {{ $data['detail_order_no'] }}</span>
                                    </div>
                                    <div class="col-sm-6 control-label">
                                        <span>订单状态: {{ \App\Models\XqOrderDetailModel::orderStatusArr[$data['detail_order_status']] ?? '' }}</span>
                                    </div>

                                </div>
                                <div class="show-field form-group row">
                                    <div class="col-sm-6 control-label">
                                        <span>订单类型: {{ \App\Models\XqRefundOrder::ORDER_TYPE[$data['order_type']] }}</span>
                                    </div>
                                    <div class="col-sm-6 control-label">
                                        <span>兑换码: {{ $data['redeem_code'] }}</span>
                                    </div>

                                </div>
                                <div class="show-field form-group row">
                                    <div class="col-sm-6 control-label">
                                        <span>下单账号: {{ $data['purchase_phone'] }}</span>
                                    </div>
                                    <div class="col-sm-6 control-label">
                                        <span>剩余有效期: {{ \Carbon\Carbon::parse($data['order_end_at'])->diffInDays($data['order_start_at'],true) }}天</span>
                                    </div>

                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>


                    <hr/>

                    <div class="card dcat-box">
                        <div class="box-header with-border" style="padding: .65rem 1rem">
                            <h3 class="box-title" style="line-height:30px;">商品信息</h3>
                        </div>
                        <div class="box-body">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th class="width10 textCenter">商品编号</th>
                                        <th class="width10 textCenter">商品名称</th>
                                        <th class="width10 textCenter">面值</th>
                                        <th class="width10 textCenter">数量</th>
                                        <th class="width10 textCenter">渠道价格</th>
                                        <th class="width10 textCenter">渠道编码</th>
                                        <th class="width10 textCenter">供货商价格</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $data['goods_no'] }}</td>
                                        <td>{{ $data['goods_name'] }}</td>
                                        <td>{{ $data['goods_price'] }}</td>
                                        <td>{{ $data['pay_num'] }}</td>
                                        <td>{{ $data['channel_price'] }}</td>
                                        <td>{{ $data['channel_no'] }}</td>
                                        <td>{{ $data['supply_price'] }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    @if(!empty($pay))
                        <hr/>
                        <div class="card dcat-box">
                            <div class="box-header with-border" style="padding: .65rem 1rem">
                                <h3 class="box-title" style="line-height:30px;">支付信息</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-xs-12 table-responsive">
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <th class="width10 textCenter">支付方式</th>
                                            <th class="width10 textCenter">退款流水号</th>
                                            <th class="width10 textCenter">支付金额</th>
                                            <th class="width10 textCenter">订单时间</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $pay->pay_channel == 1 ? '支付宝':'微信' }}</td>
                                            <td>{{ $pay->transaction_id }}</td>
                                            <td>{{ !empty($pay->pay_price) ? ($pay->pay_price)/100 : 0 }}</td>
                                            <td>{{ $pay->finish_time }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                    <hr/>

                    <div class="card dcat-box">
                        <div class="box-header with-border" style="padding: .65rem 1rem">
                            <h3 class="box-title" style="line-height:30px;">备注</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-horizontal mt-1">
                                <div class="show-field form-group row">
                                    <div class="col-sm-12 control-label">
                                        <textarea cols="70" rows="5" name="remark"
                                                  id="remark">{{ $data['remark'] }}</textarea>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>

                        @if($type == 2 && $data['order_status'] == 0)
                            <div class="box-footer">
                                <div class="col-md-2 d-md-block" style="display: none"></div>
                                @if($data['order_type'] == 3 || $data['order_type'] == 0)
                                    <div class="col-md-2">
                                        <div class="btn-group pull-left">
                                            <button class="btn btn-info refund_points"><i
                                                    class="feather icon-save"></i> 移动积分退回
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="btn-group pull-left">
                                            <button class="btn btn-success refund_post"><i
                                                    class="feather icon-save"></i> 原路退回
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                @if($data['order_type'] != 3)
                                    <div class="col-md-2">
                                        <div class="btn-group pull-left">
                                            <button class="btn btn-primary refund_submit"><i
                                                    class="feather icon-save"></i>
                                                确认退款(无二次支付)
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-2">
                                    <div class="btn-group pull-left">
                                        <button type="button" class="btn btn-danger refund_reset"><i
                                                class="feather icon-rotate-ccw"></i>
                                            拒绝退款
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($type == 2)
                            <div class="card dcat-box">
                                <div class="box-header with-border" style="padding: .65rem 1rem">
                                    <span style="color:red;">提示：<br>
                                        原路退回按钮为二次支付退款，点击后会发生实际的退款操作，请谨慎操作！<br>
                                        确认退款按钮，请在翼支付页面确认退款后操作!</span>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    Dcat.ready(function () {
        $('.refund_submit').click(function () {
            Dcat.confirm('确认退款吗？', null, function () {
                var id = $('#refund_id').val();
                var remark = $('#remark').val();
                if (remark == '') {
                    Dcat.swal.error('备注不能为空');
                    return false;
                }
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                });

                $.ajax({
                    url: "{{admin_url('refund/confirm')}}",
                    type: "POST",
                    data: {id: id, remark: remark, status: 1},
                    success: function (result) {
                        console.log(result);
                        if (result.code > 0) {
                            Dcat.swal.error(result.msg);
                        } else if (result.code == 0) {
                            Dcat.swal.success(result.msg);
                            Dcat.reload();
                        }
                    }
                });
            });


        });

        $('.refund_reset').click(function () {
            Dcat.confirm('确认拒绝退款吗？', null, function () {
                var id = $('#refund_id').val();
                var remark = $('#remark').val();
                if (remark == '') {
                    Dcat.swal.error('备注不能为空');
                    return false;
                }
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                });

                $.ajax({
                    url: "{{admin_url('refund/confirm')}}",
                    type: "POST",
                    data: {id: id, remark: remark, status: 2},
                    success: function (result) {
                        console.log(result);
                        if (result.code > 0) {
                            Dcat.swal.error(result.msg);
                        } else if (result.code == 0) {
                            Dcat.swal.success(result.msg);
                            Dcat.reload();
                        }
                    }
                });
            });
        });

        $('.refund_post').click(function () {
            Dcat.confirm('提示：款项会原路退回用户账户内，请确定操作', null, function () {
                var id = $('#refund_id').val();
                var remark = $('#remark').val();
                if (remark == '') {
                    Dcat.swal.error('备注不能为空');
                    return false;
                }
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                });

                $.ajax({
                    url: "{{admin_url('refund/order')}}",
                    type: "POST",
                    data: {id: id, remark: remark},
                    success: function (result) {
                        console.log(result);
                        if (result.code > 0) {
                            Dcat.swal.error(result.msg);
                        } else if (result.code == 0) {
                            Dcat.swal.success(result.msg);
                            Dcat.reload();
                        }
                    }
                });
            });
        });

        $('.refund_points').click(function () {
            Dcat.confirm('提示：积分会退回畅由账户内', null, function () {
                var id = $('#refund_id').val();
                var remark = $('#remark').val();
                if (remark == '') {
                    Dcat.swal.error('备注不能为空');
                    return false;
                }
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                });

                $.ajax({
                    url: "{{admin_url('refund/point')}}",
                    type: "POST",
                    data: {id: id, remark: remark},
                    success: function (result) {
                        console.log(result);
                        if (result.code > 0) {
                            Dcat.swal.error(result.msg);
                        } else if (result.code == 0) {
                            Dcat.swal.success(result.msg);
                            Dcat.reload();
                        }
                    }
                });
            });
        });
    });
</script>
