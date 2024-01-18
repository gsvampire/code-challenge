@if($goodsType == 2)
<div class="show-field form-group row">
    <div class="col-sm-2 control-label">
        <span>库存</span>
    </div>

    <div class="col-sm-8">
        <div class="box box-solid box-default no-margin box-show">
            <div class="box-body">
                {{ $kucun }}
                &nbsp;
            </div>
        </div>
    </div>
</div>
@endif
<hr/>
<h5 class="box-title" style="line-height:30px;">配置信息</h5>

<div class="col-xs-12 table-responsive">
    <table class="table table-striped table-hover">
        <tr>
            <th class="width10 textCenter">SKUID</th>
            @foreach($config as $v)
                <th class="width10 textCenter">{{ $v }}</th>
            @endforeach
            @if($goodsType != 1)
                <th class="width10 textCenter">子商品信息</th>
            @endif
            @if($goodsType != 2)
                <th class="width10 textCenter">可用库存</th>
            @endif
        </tr>
        @foreach($skuList as $k=>$value)
            <tr>
                <td>{{ $k }}</td>
                @foreach($config as $k=>$v)
                    @if(!empty($value['common'][$k]))
                        <td>{{ $value['common'][$k] }}</td>
                    @else
                        <td></td>
                    @endif
                @endforeach
                @if($goodsType != 1)
                    <td>
                        @if(!empty($value['child_goods']))
                            @foreach($value['child_goods'] as $v)
                                {{ ($v) }}<br/>
                            @endforeach
                        @else
                        @endif
                    </td>
                @endif
                @if($goodsType != 2)
                    <td>{{ $value['kucun'] }}</td>
                @endif
            </tr>
        @endforeach
    </table>
</div>



<div class="row form-group">
    <div class="col-md-2 text-capitalize "><label class="control-label pull-right">sku</label></div>
    <div class="col-md-8 ">
        <div class="help-block with-errors"></div>
        <span name="sku"></span>

        <div class="has-many-table-sku">
            <table class="table table-has-many has-many-table-sku">
                <thead>
                <tr>
                    <th>规格</th>
                    <th>会员类型</th>

                    <th class="hidden"></th>

                    <th></th>
                </tr>
                </thead>
                <tbody class="has-many-table-sku-forms">
                <tr class="has-many-table-sku-form fields-group">




                    <td><div class="form-group row form-field">

                            <div class="col-md-0 text-capitalize hidden control-label">
                                <span>规格</span>
                            </div>

                            <div class="col-md-12 ">

                                <div class="help-block with-errors"></div>
                                <select class="form-control field_sku_19 field_attribute_params_0_19 field_attribute_params_0 select2-hidden-accessible" style="width: 100%!important;" name="sku[19][attribute_params_0][]" multiple="" data-placeholder="规格" build-ignore="1" data-value="1,2" initialized="1" id="_06378615357a6981" data-select2-id="select2-data-_06378615357a6981" tabindex="-1" aria-hidden="true">
                                    <option value="1" selected="" data-select2-id="select2-data-18-8kyc">月卡</option>
                                    <option value="2" selected="" data-select2-id="select2-data-19-b681">季卡</option>
                                    <option value="3">半年卡</option>
                                    <option value="4">年卡</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-17-a43z" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><button type="button" class="select2-selection__clear" tabindex="-1" title="删除所有项目" aria-label="删除所有项目" aria-describedby="select2-_06378615357a6981-container" data-select2-id="select2-data-22-tp5b"><span aria-hidden="true">×</span></button><ul class="select2-selection__rendered" id="select2-_06378615357a6981-container"><li class="select2-selection__choice" title="月卡" data-select2-id="select2-data-20-nuku"><button type="button" class="select2-selection__choice__remove" tabindex="-1" title="Remove item" aria-label="Remove item" aria-describedby="select2-_06378615357a6981-container-choice-sipd-1"><span aria-hidden="true">×</span></button><span class="select2-selection__choice__display" id="select2-_06378615357a6981-container-choice-sipd-1">月卡</span></li><li class="select2-selection__choice" title="季卡" data-select2-id="select2-data-21-5an7"><button type="button" class="select2-selection__choice__remove" tabindex="-1" title="Remove item" aria-label="Remove item" aria-describedby="select2-_06378615357a6981-container-choice-ae54-2"><span aria-hidden="true">×</span></button><span class="select2-selection__choice__display" id="select2-_06378615357a6981-container-choice-ae54-2">季卡</span></li></ul><span class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-describedby="select2-_06378615357a6981-container" placeholder="" style="width: 0.75em;"></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                <input type="hidden" name="sku[19][attribute_params_0][]">


                            </div>
                        </div></td>


                    <td><div class="form-group row form-field">

                            <div class="col-md-0 text-capitalize hidden control-label">
                                <span>会员类型</span>
                            </div>

                            <div class="col-md-12 ">

                                <div class="help-block with-errors"></div>
                                <select class="form-control field_sku_19 field_attribute_params_1_19 field_attribute_params_1 select2-hidden-accessible" style="width: 100%!important;" name="sku[19][attribute_params_1][]" multiple="" data-placeholder="会员类型" build-ignore="1" data-value="5" initialized="1" id="_4b20031a39a2897" data-select2-id="select2-data-_4b20031a39a2897" tabindex="-1" aria-hidden="true">
                                    <option value="5" selected="" data-select2-id="select2-data-24-ohku">黄金会员</option>
                                    <option value="6">白金会员</option>
                                    <option value="7">星钻会员</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-23-sznj" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><button type="button" class="select2-selection__clear" tabindex="-1" title="删除所有项目" aria-label="删除所有项目" aria-describedby="select2-_4b20031a39a2897-container" data-select2-id="select2-data-26-hcn6"><span aria-hidden="true">×</span></button><ul class="select2-selection__rendered" id="select2-_4b20031a39a2897-container"><li class="select2-selection__choice" title="黄金会员" data-select2-id="select2-data-25-xi15"><button type="button" class="select2-selection__choice__remove" tabindex="-1" title="Remove item" aria-label="Remove item" aria-describedby="select2-_4b20031a39a2897-container-choice-6qg8-5"><span aria-hidden="true">×</span></button><span class="select2-selection__choice__display" id="select2-_4b20031a39a2897-container-choice-6qg8-5">黄金会员</span></li></ul><span class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-describedby="select2-_4b20031a39a2897-container" placeholder="" style="width: 0.75em;"></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                <input type="hidden" name="sku[19][attribute_params_1][]">


                            </div>
                        </div></td>



                    <td class="hidden"><input type="hidden" name="sku[19][id]" value="19" class="field_sku_19 field_id_19 field_id" build-ignore="1"><input type="hidden" name="sku[19][_remove_]" value="" class="field_sku_19 field__remove__19 field__remove_ form-removed field_sku_19___remove__ _normal_" build-ignore="1"></td>

                    <td class="form-group">
                        <div>
                            <div class="remove btn btn-white btn-sm pull-right"><i class="feather icon-trash"></i></div>
                        </div>
                    </td>
                </tr>
                <tr class="has-many-table-sku-form fields-group">




                    <td><div class="form-group row form-field">

                            <div class="col-md-0 text-capitalize hidden control-label">
                                <span>规格</span>
                            </div>

                            <div class="col-md-12 ">

                                <div class="help-block with-errors"></div>
                                <select class="form-control field_sku_20 field_attribute_params_0_20 field_attribute_params_0 select2-hidden-accessible" style="width: 100%!important;" name="sku[20][attribute_params_0][]" multiple="" data-placeholder="规格" build-ignore="1" data-value="1,2" initialized="1" id="_27223241a7689449" data-select2-id="select2-data-_27223241a7689449" tabindex="-1" aria-hidden="true">
                                    <option value="1" selected="" data-select2-id="select2-data-28-k9bi">月卡</option>
                                    <option value="2" selected="" data-select2-id="select2-data-29-7nu9">季卡</option>
                                    <option value="3">半年卡</option>
                                    <option value="4">年卡</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-27-9nts" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><button type="button" class="select2-selection__clear" tabindex="-1" title="删除所有项目" aria-label="删除所有项目" aria-describedby="select2-_27223241a7689449-container" data-select2-id="select2-data-32-efcf"><span aria-hidden="true">×</span></button><ul class="select2-selection__rendered" id="select2-_27223241a7689449-container"><li class="select2-selection__choice" title="月卡" data-select2-id="select2-data-30-sa2v"><button type="button" class="select2-selection__choice__remove" tabindex="-1" title="Remove item" aria-label="Remove item" aria-describedby="select2-_27223241a7689449-container-choice-5g3l-1"><span aria-hidden="true">×</span></button><span class="select2-selection__choice__display" id="select2-_27223241a7689449-container-choice-5g3l-1">月卡</span></li><li class="select2-selection__choice" title="季卡" data-select2-id="select2-data-31-0ukt"><button type="button" class="select2-selection__choice__remove" tabindex="-1" title="Remove item" aria-label="Remove item" aria-describedby="select2-_27223241a7689449-container-choice-xse1-2"><span aria-hidden="true">×</span></button><span class="select2-selection__choice__display" id="select2-_27223241a7689449-container-choice-xse1-2">季卡</span></li></ul><span class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-describedby="select2-_27223241a7689449-container" placeholder="" style="width: 0.75em;"></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                <input type="hidden" name="sku[20][attribute_params_0][]">


                            </div>
                        </div></td>


                    <td><div class="form-group row form-field">

                            <div class="col-md-0 text-capitalize hidden control-label">
                                <span>会员类型</span>
                            </div>

                            <div class="col-md-12 ">

                                <div class="help-block with-errors"></div>
                                <select class="form-control field_sku_20 field_attribute_params_1_20 field_attribute_params_1 select2-hidden-accessible" style="width: 100%!important;" name="sku[20][attribute_params_1][]" multiple="" data-placeholder="会员类型" build-ignore="1" data-value="5" initialized="1" id="_92b31128128b90b" data-select2-id="select2-data-_92b31128128b90b" tabindex="-1" aria-hidden="true">
                                    <option value="5" selected="" data-select2-id="select2-data-34-56s5">黄金会员</option>
                                    <option value="6">白金会员</option>
                                    <option value="7">星钻会员</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-33-sciy" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><button type="button" class="select2-selection__clear" tabindex="-1" title="删除所有项目" aria-label="删除所有项目" aria-describedby="select2-_92b31128128b90b-container" data-select2-id="select2-data-36-3slf"><span aria-hidden="true">×</span></button><ul class="select2-selection__rendered" id="select2-_92b31128128b90b-container"><li class="select2-selection__choice" title="黄金会员" data-select2-id="select2-data-35-m2cg"><button type="button" class="select2-selection__choice__remove" tabindex="-1" title="Remove item" aria-label="Remove item" aria-describedby="select2-_92b31128128b90b-container-choice-9tji-5"><span aria-hidden="true">×</span></button><span class="select2-selection__choice__display" id="select2-_92b31128128b90b-container-choice-9tji-5">黄金会员</span></li></ul><span class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-describedby="select2-_92b31128128b90b-container" placeholder="" style="width: 0.75em;"></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                <input type="hidden" name="sku[20][attribute_params_1][]">


                            </div>
                        </div></td>



                    <td class="hidden"><input type="hidden" name="sku[20][id]" value="20" class="field_sku_20 field_id_20 field_id" build-ignore="1"><input type="hidden" name="sku[20][_remove_]" value="" class="field_sku_20 field__remove__20 field__remove_ form-removed field_sku_20___remove__ _normal_" build-ignore="1"></td>

                    <td class="form-group">
                        <div>
                            <div class="remove btn btn-white btn-sm pull-right"><i class="feather icon-trash"></i></div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <template class="sku-tpl">
                <tr class="has-many-table-sku-form fields-group">

                    <td><div class="form-group row form-field">

                            <div class="col-md-0 text-capitalize hidden control-label">
                                <span>规格</span>
                            </div>

                            <div class="col-md-12 ">

                                <div class="help-block with-errors"></div>
                                <select class="form-control field_sku_ field_attribute_params_0_ field_attribute_params_0" style="width: 100%!important;" name="sku[new___NESTED__][attribute_params_0][]" multiple="" data-placeholder="规格" build-ignore="1" data-value="1,2">
                                    <option value="1" selected="">月卡</option>
                                    <option value="2" selected="">季卡</option>
                                    <option value="3">半年卡</option>
                                    <option value="4">年卡</option>
                                </select>
                                <input type="hidden" name="sku[new___NESTED__][attribute_params_0][]">


                            </div>
                        </div></td><td><div class="form-group row form-field">

                            <div class="col-md-0 text-capitalize hidden control-label">
                                <span>会员类型</span>
                            </div>

                            <div class="col-md-12 ">

                                <div class="help-block with-errors"></div>
                                <select class="form-control field_sku_ field_attribute_params_1_ field_attribute_params_1" style="width: 100%!important;" name="sku[new___NESTED__][attribute_params_1][]" multiple="" data-placeholder="会员类型" build-ignore="1" data-value="5">
                                    <option value="5" selected="">黄金会员</option>
                                    <option value="6">白金会员</option>
                                    <option value="7">星钻会员</option>
                                </select>
                                <input type="hidden" name="sku[new___NESTED__][attribute_params_1][]">


                            </div>
                        </div></td><td class="hidden"><input type="hidden" name="sku[new___NESTED__][id]" value="" class="field_sku_ field_id_ field_id" build-ignore="1"><input type="hidden" name="sku[new___NESTED__][_remove_]" value="" class="field_sku_ field__remove__ field__remove_ form-removed field_sku_new___NESTED_____remove__ _normal_" build-ignore="1"></td>

                    <td class="form-group">
                        <div>
                            <div class="remove btn btn-white btn-sm pull-right"><i class="feather icon-trash"></i></div>
                        </div>
                    </td>
                </tr>
            </template>

            <div class="form-group row m-t-10">
                <div class="col-md-8 " style="margin-top: 8px">
                    <div class="add btn btn-primary btn-outline btn-sm"><i class="feather icon-plus"></i>&nbsp;新增</div>
                </div>
            </div>
        </div>
    </div>
</div>
