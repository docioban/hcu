<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Constituency;
use App\LanguageConstituencies;
use App\LanguageLocality;

class ConstituencyController extends Controller
{
    public function constituency($locale, $slug)
    {
        $constituency = Constituency::whereSlug($slug)->firstOrFail();

        $constituency->language_constituencies = LanguageConstituencies::where('constituency_id', $constituency->constituency_name)
        ->where('language', $locale)
        ->firstOrFail();

        $constituency->locality = LanguageLocality::whereHas('locality', function ($q) use ($constituency) {

            $q->where('constituency_id', $constituency->constituency_name);

        })->where('language', $locale)->get();

        $constituency->candidate = Candidate::where('constituency_id', $constituency->constituency_name)->get();

        return response()->json($constituency);
    }

    public function constituency_all($locale)
    {
        $constituencies = LanguageConstituencies::where('language', $locale)->get();

        return response()->json($constituencies);
    }
}
