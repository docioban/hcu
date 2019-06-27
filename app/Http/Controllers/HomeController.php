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
        return view('welcome');

        $districts = Constituencies::select('id', 'name')->get();

        return response()->json($districts);

    }

    public function welcome()
    {
        return view('welcome');

        $districts = Constituencies::select('id', 'name')->get();

        return response()->json($districts);

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
