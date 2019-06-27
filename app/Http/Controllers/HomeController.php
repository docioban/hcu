<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Adress;
use App\Locality;
use App\District;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {      
        $districts = District::all();

        return response()->json($districts);

    }

    public function get_district(Adress $request)
    {
        $if = Locality::where('name', 'like', $request->input('locality'))->first();

        return $if;

        //return redirect('/');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $instituties = DB::table('instituties')->where('name', 'like', '%' . $search . '%')->paginate(5);
        //return view('home', ['institutii' => $instituties]);
        return response()->json($instituties);
    }
}
