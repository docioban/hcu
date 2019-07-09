<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Constituencies;
use App\Http\Requests\Adress;
use App\Language;
use App\LanguageConstituencies;
use App\Locality;
use App\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
            $constituencies = LanguageConstituencies::where('name', 'like', '%'.Str::lower($query).'%')->get();//todo corect, string-ul care vine de pe front e lower, dar care sunt sansele ca in baza sting-ul asta e mereu lower?
            $candidates = Candidate::where('name', 'like', '%'.Str::lower($query).'%')->get();
            $sections = Section::where('address', 'like', '%'.Str::lower($query).'%')->get();
        } else {
            $constituencies = LanguageConstituencies::where('language', $locale)->take(10)->get();//todo returnati doar translate, trebuie tot obiectul, care contine obiectul de translate
            $candidates = Candidate::take(10)->get();
            $sections = Section::take(10)->get();
        }
        return response()->json(['candidates' => $candidates, 'constituencies' => $constituencies, 'sections' => $sections]);
    }
}
