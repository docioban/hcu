<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Http\Requests\Adress;
use App\Language;
use App\LanguageConstituencies;
use App\Section;
use Illuminate\Http\Request;

class LiveSearchController extends Controller
{
    function index()
    {
        return view('live_search');
    }

    function action($locale, Request $request)
    {
        $query = $request->get('query');
        if ($query) {
            $constituencies = LanguageConstituencies::where('name', 'like', '%'.$query.'%')->get();
            $candidates = Candidate::where('name', 'like', '%'.$query.'%')->get();
            $sections = Section::where('address', 'like', '%'.$query.'%')->get();
        } else {
            $constituencies = LanguageConstituencies::where('language', $locale)->with('constituency')->take(10)->get();
            $candidates = Candidate::take(10)->get();
            $sections = Section::take(10)->get();
        }
        return response()->json(['candidates' => $candidates, 'constituencies' => $constituencies, 'sections' => $sections]);
    }
}
