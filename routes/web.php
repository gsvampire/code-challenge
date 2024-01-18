<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//线上环境强调https
if (env('APP_ENV') == 'prod') {
    URL::forceScheme('https');
}

Route::get('/', function () {
    return view('site.index');
    //exit('上海小茄信息技术服务有限公司');
});

Route::group(['prefix' => 'contact','namespace' => 'App\Http\Controllers'], function () {
    Route::post('/suggestion', 'IndexController@postSuggestion');

});
