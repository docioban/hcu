<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Adress;
use App\Locality;
use App\Constituencies;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {      
        $districts = Constituencies::select('id', 'name')->get();

        return response()->json($districts);

    }

    public function get_district(Adress $request)
    {
        $constituence = '';

        if ($request->input('locality') == 'Chisinau' && $request->input('route') == '')   
            $constituence = Constituencies::whereHas('locality', function ($q) use ($request) {
                $q->where('name', 'like', '%'. $request->input('locality') .'%');
            })->first();
        elseif ($request->input('locality') == 'Chisinau' && $request->input('route') != '')
            $constituence = Constituencies::whereHas('locality', function ($q) use ($request) {
                $q->where('name', 'like', '%'. $request->input('route') .'%');
            })->first(); 
        else
            $constituence = Constituencies::whereHas('locality', function ($q) use ($request) {
                $q->where('name', 'like', '%'. $request->input('locality') .'%');
            })->first();

        return response()->json($constituence);

        return redirect('/constituence')->with($constituence);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $instituties = DB::table('instituties')->where('name', 'like', '%' . $search . '%')->paginate(5);
        //return view('home', ['institutii' => $instituties]);
        return response()->json($instituties);
    }
}
