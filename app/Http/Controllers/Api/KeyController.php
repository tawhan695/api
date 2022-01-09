<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keytime;
use App\Models\Key_has_user;
class KeyController extends Controller
{
    public function index(Request $request){

        $Keytime = Keytime::where('keytime',$request->token)->first();
        if ($Keytime) {

            return response()->json([
                'key' => $Keytime->keytime ,
                'days' => $Keytime->days ,
                'status_code' => 200,
                ])
                ->header('Content-Type', 'application/json','charset=utf-8');
        } else {
            return response()->json([
                'key' => 'not key !!' ,
                'status_code' => 403,
                ])
                ->header('Content-Type', 'application/json','charset=utf-8');
            # code...
        }
    }
    public function getday(Request $request){
        // $key = Key_has_user::join('keytimes','key_has_users.keytime_id', '=','keytimes.id')
        $keytime_id = Key_has_user::where('user_id' ,$request->id)->first()->keytime_id;
        // ->select('keytimes.keytime','keytimes.days')
        // ->first();
        $Keytime = Keytime::where('id',$keytime_id)->first();
        // print(key)
        if ($Keytime) {

            return response()->json([
                'key' => $Keytime->keytime ,
                'days' => $Keytime->days ,
                'status_code' => 200,
                ])
                ->header('Content-Type', 'application/json','charset=utf-8');
        } else {
            return response()->json([
                'key' => 'not key !!' ,
                'status_code' => 403,
                ])
                ->header('Content-Type', 'application/json','charset=utf-8');
            # code...
        }
    }
}
