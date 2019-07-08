<?php

namespace App\Http\Controllers;

use App\Language;
use App\Post;
use App\Candidate;
use App\Constituency;
use App\LanguageConstituencies;
use App\LanguageLocality;

class HcuController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($locale, AddressRequest $request)
    {
        $constituency = null;

        if ($request->get('locality') == 'Chisinau' && $request->get('route') == '') { 

            $constituency = Constituency::whereHas('locality', function ($q) use ($request) {
                $q->where('name', 'like', '%'. $request->get('locality') .'%');
            })->first();

        } elseif ($request->get('locality') == 'Chisinau' && $request->get('route') != '') {

            $constituency = Constituency::whereHas('locality', function ($q) use ($request) {
                $q->where('name', 'like', '%'. $request->get('route') .'%');
            })->first();

        } elseif ($request->get('locality') != '' && $request->get('route') == '') {

            $constituency = Constituency::whereHas('locality', function ($q) use ($request) {
                $q->where('name', 'like', '%'. $request->get('locality') .'%');
            })->first();

        }

        $language = Language::where('name', $locale)->first();

        $langconstituency = LanguageConstituencies::where('constituency_id', $constituency->constituency_name)
        ->where('language_id', $language->id)
        ->first();

        return response()->json(['constituency' => [$constituency, $langconstituency]]);

    }

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

    public function candidate($locale, $slug)
    {
        $candidate = Candidate::whereHas('posts', function ($q) use ($locale) {
            $q->where('language', $locale);
        })->with('posts')->first();

        if ($candidate == null) 
            $candidate = Candidate::()

        // $candidate = Candidate::whereSlug($slug)
        // ->with('posts')
        // ->where('language', )
        // ->firstOrFail();

        // $language = Language::where('name', $locale)->first();

        return response()->json($candidate);    
    }

    public function constituency_all($locale)
    {
        $language = Language::where('name', $locale)->first();

        $constituencies = LanguageConstituencies::where('language_id', $language->id)->get();

        return response()->json($constituencies);
    }
}
