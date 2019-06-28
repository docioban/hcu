<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Constituencies;
use App\Locality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LiveSearchController extends Controller
{
    function index()
    {
        return view('live_search');
    }

    function action(Request $request)
    {
            $query = $request->get('query');
            if ($query) {
                $constituencies = Constituencies::where('name', 'like', '%'.$query.'%')->get();
                $candidate = Candidate::where('name', 'like', '%'.$query.'%')->get();
            } else {
                $constituencies = Constituencies::all();
                $candidate = Candidate::all();
            }
            return response()->json(['constituencies' => $constituencies, 'candidate' => $candidate, 'query' => $query]);
    }
}
