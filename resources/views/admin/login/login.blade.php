<style>
    .login-box {
    margin-top: -10rem;
        padding: 5px;
    }
    .login-card-body {
    padding: 1.5rem 1.8rem 1.6rem;
    }
    .card, .card-body {
    border-radius: .25rem
    }
    .login-btn {
    padding-left: 2rem!important;;
        padding-right: 1.5rem!important;
    }
    .content {
    overflow-x: hidden;
    }
    .form-group .control-label {
    text-align: left;
    }

    .div_display{
        display: block;
    }

    .no_display{
        display: none;
    }
</style>

<div class="login-page bg-40">
    <div class="login-box">
        <div class="login-logo mb-2">
{{ config('admin.name') }}
</div>
<div class="card">
    <div class="card-body login-card-body shadow-100">
        <p class="login-box-msg mt-1 mb-1">{{ __('admin.welcome_back') }}</p>
        @csrf

        <form id="login-form" method="POST" action="{{ admin_url('auth/login') }}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <fieldset class="form-label-group form-group position-relative has-icon-left">
                <input
                    type="text"
                    class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                    name="username"
                    placeholder="{{ trans('admin.username') }}"
                    value="{{ old('username') }}"
                    required
                    autofocus
                >

                <div class="form-control-position">
                    <i class="feather icon-user"></i>
                </div>

                <label for="email">{{ trans('admin.username') }}</label>

                <div class="help-block with-errors"></div>
                @if($errors->has('username'))
                    <span class="invalid-feedback text-danger" role="alert">
                                            @foreach($errors->get('username') as $message)
                            <span class="control-label" for="inputError"><i class="feather icon-x-circle"></i> {{$message}}</span><br>
                        @endforeach
                                        </span>
                @endif
            </fieldset>

            <fieldset class="form-label-group form-group position-relative has-icon-left add_error no_display">
                <input
                    type="number"
                    class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}"
                    name="code"
                    id="code"
                    placeholder="验证码"
                    value=""
                    autofocus
                    style="width:55%;display: inline-flex;"
                >

                <span class="btn btn-info float-right getCode">获取验证码</span>

                <div class="form-control-position">
                    <i class="feather icon-user"></i>
                </div>

                <label for="email">验证码</label>

            <div class="help-block with-errors"></div>
            @if($errors->has('code'))
                <span class="invalid-feedback text-danger" role="alert">
                                        @foreach($errors->get('code') as $message)
                        <span class="control-label" for="inputError"><i class="feather icon-x-circle"></i> {{$message}}</span><br>
                    @endforeach
                                    </span>
            @endif
            </fieldset>

            <fieldset class="form-label-group form-group position-relative has-icon-left">
                <input
                    minlength="5"
                    maxlength="20"
                    id="password"
                    type="password"
                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                    name="password"
                    placeholder="{{ trans('admin.password') }}"
                    required
                    autocomplete="current-password"
                >

                <div class="form-control-position">
                    <i class="feather icon-lock"></i>
                </div>
                <label for="password">{{ trans('admin.password') }}</label>

                <div class="help-block with-errors"></div>
                @if($errors->has('password'))
                    <span class="invalid-feedback text-danger" role="alert">
                                            @foreach($errors->get('password') as $message)
                            <span class="control-label" for="inputError"><i class="feather icon-x-circle"></i> {{$message}}</span><br>
                        @endforeach
                                            </span>
                @endif

            </fieldset>



            <div class="form-group d-flex justify-content-between align-items-center">
                <div class="text-left">
                    @if(config('admin.auth.remember'))
                        <fieldset class="checkbox">
                            <div class="vs-checkbox-con vs-checkbox-primary">
                                <input id="remember" name="remember"  value="1" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                          <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                <span> {{ trans('admin.remember_me') }}</span>
                            </div>
                        </fieldset>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-right login-btn">

                {{ __('admin.login') }}
                &nbsp;
                <i class="feather icon-arrow-right"></i>
            </button>
        </form>

    </div>
</div>
</div>
</div>

<script>
    var time = 60;

    //等待时间
    function waitTime(option) {
        if (time == 0) {
            $('.getCode').attr("disabled",false);
            $('.getCode').text('获取验证码');
            time = 60;
        } else {
            $('.getCode').attr("disabled", true);
            $('.getCode').text("重新发送(" + time + ")");
            time--;
            setTimeout(function () {
                waitTime(option)
            }, 1000)
        }
    }

    Dcat.ready(function () {
        // ajax表单提交
        $('#login-form').form({
            validate: true,
            before: function (fields, form, opt) {
                console.log('所有表单字段的值', fields);
            },
            success: function (response) {

            },
            error: function (response) {
                var errorData = JSON.parse(response.responseText);
                if(errorData.errors.code == 'code must' || errorData.errors.code == 'code error'){
                    $('.add_error').removeClass('no_display');
                }

            }
        });

        //获取验证码
        $('.getCode').click(function(){
            $("#code").attr("required",true);
            this.setAttribute("disabled", true);
            var phone = $("input[name='username']").val();
            var reg = /^1[3456789]\d{9}$/;
            if( !reg.test(phone) )
            {
                Dcat.error('手机号错误' ,null, {
                    timeOut: 5000, // 5秒后自动消失
                });
                this.removeAttribute("disabled");
                $("input[name='username']").focus();
            }else{
                //开始倒计时
                waitTime(this);

                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                });

                $.ajax({
                    url: "{{admin_url('getSmsCode')}}",
                    type: "POST",
                    data: {cell: phone},
                    success: function (result) {
                        if (result.code > 0) {
                            Dcat.error(result.msg);
                        } else if (result.code == 0) {
                            // 请求验证通过
                            Dcat.success(result.msg);
                        }
                    }
                });
            }
        });
    });



</script>
