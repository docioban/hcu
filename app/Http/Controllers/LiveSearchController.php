<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Constituencies;
use App\Language;
use App\LanguageConstituencies;
use App\Locality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LiveSearchController extends Controller
{
    function index(Request $request)
    {
        return view('live_search');
    }

    function action($locale, Request $request)
    {
        $language = Language::where('name', $locale)->first();
        $query = $request->get('query');
        if ($query) {
            $constituencies = LanguageConstituencies::where('name', 'like', '%'.$query.'%')->get();
            $candidate = Candidate::where('name', 'like', '%'.$query.'%')->get();
        } else {
            $constituencies = LanguageConstituencies::where('language_id', $language->id)->paginate(10);
            $candidate = Candidate::paginate(10);
        }
        return response()->json(['constituencies' => $constituencies, 'candidate' => $candidate]);
    }
}
