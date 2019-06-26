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
//        $response = \GoogleMaps::load('geocoding')
//            ->setParamByKey('latlng', '47.026288, 28.832056')
//            ->get('results.formatted_address');
//
//        return $response;

        return app('geocoder')->reverse(43.882587,-103.454067)->get();

        $arr_ip = geoip()->getLocation('217.12.124.50');

        $arr_ip = $arr_ip->toArray();

        //dd($arr_ip);

        return $arr_ip['lat'].','.$arr_ip['lon'];

        return $json;
        
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
