<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Constituency;
use App\LanguageConstituencies;
use App\LanguageLocality;
use App\Http\Resources\ConstituenciesResource;

class ConstituencyController extends Controller
{
    public function constituency($locale, $slug)
    {
        // $constituency = Constituency::whereSlug($slug)->firstOrFail();

        // $constituency->language_constituencies = LanguageConstituencies::where('constituency_id', $constituency->constituency_name)
        // ->where('language', $locale)
        // ->firstOrFail();

        // $constituency->locality = LanguageLocality::whereHas('locality', function ($q) use ($constituency) {

        //     $q->where('constituency_id', $constituency->constituency_name);

        // })->where('language', $locale)->get();

        // $constituency->candidate = Candidate::where('constituency_id', $constituency->constituency_name)->get();

// =====================================================================

        // $constituency = Constituency::whereSlug($slug)
        // ->with('locality')
        // ->with('candidate')
        // ->with('language_constituencies')
        // ->firstOrFail();

// =====================================================================

        $constituency = Constituency::whereSlug($slug)
        ->with('language_constituencies')
        ->with('locality.language_locality')
        ->with('candidate')
        ->firstOrFail();

        return response()->json($constituency);
    }

    public function constituency_all($locale)
    {
       // return ConstituenciesResource::collection(Constituency::all());

       return response()->json(Constituency::with('language_constituencies')->get());

    }
}
