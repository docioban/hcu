<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\circumscription;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$arr_ip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);

        //dd($arr_ip);

        //return $arr_ip;
        
        return view('home');
        
    }

    public function welcome() {
        return view('welcome');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $instituties = DB::table('instituties')->where('name', 'like', '%' . $search . '%')->paginate(5);
        //return view('home', ['institutii' => $instituties]);
        return response()->json($instituties);
    }
}
