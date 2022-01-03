<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Key_has_user;
use App\Models\Keytime;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getKey(){

        $data =  Key_has_user::where('user_id',$this->id)
        ->join('keytimes','key_has_users.keytime_id', '=', 'keytimes.id')
        ->first();
        if ($data) {
            # code...
            return $data ;
        } else {
            return false ;
        }

    }

    public function asignKey($key){
        $Keytime = Keytime::where('keytime',$key)->first();
        if ($Keytime) {

            if(Key_has_user::where('keytime_id',$Keytime->id)->first()) {


                return false;
            }else{
                $Key_has_user = new  Key_has_user;
                $Key_has_user->keytime_id = $Keytime->id;
                $Key_has_user->user_id = auth()->user()->id;
                $Key_has_user->save();
                return true;

            }

            echo $key;
            return false;
        }else{
            return false;
        }

    }
}
