<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keytime;
use App\Models\Key_has_user;

class codetime extends Controller
{
    public function update(){
        $key = Key_has_user::join('keytimes','key_has_users.keytime_id', '=','keytimes.id')
    ->select('key_has_users.*','keytimes.keytime','keytimes.days')
    ->get();
    // ->join('keytimes','key_has_users.keytime_id', '=', 'keytimes.id')
    foreach ($key as $item ){
        Keytime::where('keytime',$item->keytime)->update(['days'=>$item->days-1]);
        echo $item->days ;
    }
    }
}
