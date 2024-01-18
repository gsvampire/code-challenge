<?php

namespace App\Http\Middleware;

use App\Models\AdminUserExt;
use Closure;
use Dcat\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class CheckUserAction
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = Admin::user()->id;
        //获取用户过期时间
        $cacheTime = Cache::store('file')->get('check_action_' . $userId);
        //执行动作前判断时间是否过期
        $cacheDiff = Carbon::now()->diffInMinutes($cacheTime, false);
        $setDueTime = Carbon::now()->addMinutes(30);
        if ($cacheDiff < 0) {
            //过期
            //退出登录
            Admin::guard()->logout();
            $request->session()->invalidate();
            return admin_redirect(admin_url('auth/login'));
        } else {
            //数据库的时间，在有限期内最后5分钟再更新
            $duetime = Admin::user()->login_duetime;
            $diff = Carbon::now()->diffInMinutes($duetime, false);
            if ($diff <= 5) {
                //最后5分钟更新数据库
                $info = AdminUserExt::query()->where('id', $userId)->first();
                $info->login_duetime = $setDueTime;
                $info->save();
            }
        }

        //每次都更新缓存
        Cache::store('file')->set('check_action_' . $userId, $setDueTime, 18000);

        return $next($request);
    }
}
