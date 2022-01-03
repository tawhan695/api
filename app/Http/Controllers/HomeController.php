<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Keytime;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $Keytime = Keytime::where('keytime',$request->token)->first();
        // if ($Keytime) {

        //     return view('home')->with([
        //         'key' => $Keytime->keytime ,
        //         'days' => $Keytime->days ,
        //         'status_code' => 200,
        //     ]);
        //         // ->header('Content-Type', 'application/json','charset=utf-8');
        // } else {
        //     return view('home')->with([
        //         'key' => 'not key !!' ,

        //     ]);

        //     # code...
        // }


        return view('home')->with(['key'=>auth()->user()->getKey()]);
    }
    public function send_code(Request $request){
        if(!$request->code){
            return back();
        }else{
            print_r(auth()->user()->asignKey($request->code));
            if(auth()->user()->asignKey($request->code)){
                // return redirect()->back();
                return redirect()->back()->withErrors(['success' =>'success']);
            }else{
                return redirect()->back()->withErrors(['error' =>'โค้ดนี้มีผู้ใช้แล้ว']);
            }
        }
        // print_r($request->all());

    }
    public function open(Request $request){
        print_r($request->all());
    }
}
