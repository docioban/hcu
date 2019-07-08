<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConstituencyController extends Controller
{
    public function constituency($locale, $slug)
    {
        $constituency = Constituency::whereSlug($slug)->firstOrFail();

        $language = Language::where('name', $locale)->first();

        $langconstituency = LanguageConstituencies::where('constituency_id', $constituency->constituency_name)
        ->where('language_id', $language->id)
        ->first();

        $locality = LanguageLocality::whereHas('locality', function ($q) use ($constituency) {

            $q->where('constituency_id', $constituency->constituency_name);

        })->where('language_id', $language->id)->get();

        $candidates = Candidate::where('constituency_id', $constituency->constituency_name)->get();

        return response()->json([
            'constituency' => $constituency,
            'langconstituency' => $langconstituency,
            'locality' => $locality,
            'candiates' => $candidates
        ]);
    }

    public function constituency_all($locale)
    {
        $language = Language::where('name', $locale)->first();

        $constituencies = LanguageConstituencies::where('language_id', $language->id)->get();

        return response()->json($constituencies);
    }
}
