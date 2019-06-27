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
    {
        return view('welcome');

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
        return response()->json($districts);

    }

    public function welcome()
    {
        return view('welcome');

        $districts = Constituencies::select('id', 'name')->get();

        return response()->json($districts);

        return redirect('/constituence')->with($constituence);
    }

    public function get_district(Adress $request)
    {
        if (Constituencies::whereHas('locality', function ($q){
            $q->where('user_id', 1);
        })->whereHas('permissions', function ($q){
            $q->where('name', 'group_make');
        })->exists())

            $if = Constituencies::where('locality.name', 'like', '%' . $request->input('locality') . '%')->get();

        return $if;

        //return redirect('/');
    }
}
