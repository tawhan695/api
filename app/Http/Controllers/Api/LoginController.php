<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Phattarachai\LineNotify\Facade\Line;



class LoginController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
                // 'status_code' => 401,

                ]);
        }else{
            $Username= $request->username;
            $Password= $request->password;
            $user = User::where('email','=',$Username)->first();
            $user_id = User::where('email','=',$Username)->first()->id;

            if (! $user || ! Hash::check( $Password, $user->password)) {
                return response()->json([
                    'sucess' => false,
                    'error' => 'ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง',
                    // 'status_code' => 401,
                    ])
                    ->header('Content-Type', 'application/json','charset=utf-8');

            }else{
                if ($user->tokenCan('server:update')) {
                 $token = $user->tokenCan('server:update');
                }else{
                    $token =$user->createToken($request->device_name)->plainTextToken;
                }
                // จากใน Controller หรือที่อื่น ๆ
                Line::send('User Login :'.  $user .' ** device_name :'.$request->device_name);
                return response()->json([
                    'sucess' => true,
                    'user' => $user,
                    'token' => $token,
                    ])
                    ->header('Content-Type', 'application/json','charset=utf-8');
            }
        }
    }
}
