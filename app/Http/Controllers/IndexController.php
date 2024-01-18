<?php
namespace App\Http\Controllers;

use App\Models\XqUserSuggestion;

class IndexController extends Controller {

    public function postSuggestion(\Illuminate\Http\Request $request){
        $params = $request->all();

        $res = XqUserSuggestion::query()->insert($params);

        return response()->json(['data'=>$res,'code'=>200]);

    }
}
