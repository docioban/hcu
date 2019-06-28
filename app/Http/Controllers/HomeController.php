<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Adress;
use App\Locality;
use App\Constituency;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Adress $request)
    {

        $constituence = null;

        if (Input::get('locality') == 'Chisinau' && Input::get('route') == '')
            $constituence = Constituency::whereHas('locality', function ($q) {
                $q->where('name', 'like', '%'. Input::get('locality') .'%');
            })->first();
        elseif (Input::get('locality') == 'Chisinau' && Input::get('route') != '')
            $constituence = Constituency::whereHas('locality', function ($q) {
                $q->where('name', 'like', '%'. Input::get('route') .'%');
            })->first();
        elseif (Input::get('locality') != '' && Input::get('route') != '')
            $constituence = Constituency::whereHas('locality', function ($q) {
                $q->where('name', 'like', '%'. Input::get('locality') .'%');
            })->first();

        return response()->json($constituence);

    }

    public function get_district()
    {

    }

    public function welcome($locale)
    {
        return view('dashboard');
    }

    public function search(Adress $request)
    {
        if (Constituency::whereHas('locality', function ($q){
            $q->where('user_id', 1);
        })->whereHas('permissions', function ($q){
            $q->where('name', 'group_make');
        })->exists())

            $if = Constituency::where('locality.name', 'like', '%' . $request->input('locality') . '%')->get();

        return $if;

        //return redirect('/');
    }
}
