<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Geo_locationController extends Controller
{
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
}
