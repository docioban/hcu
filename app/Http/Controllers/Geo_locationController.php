<?php

namespace App\Http\Controllers;

use App\Locality;
use Illuminate\Http\Request;
use App\Constituency;
use App\LanguageConstituencies;
use Illuminate\Support\Str;
use Victorybiz\GeoIPLocation\GeoIPLocation;

class Geo_locationController extends Controller
{
    public function index($locale, Request $request)
    {
        if ($request->get('locality') == 'Chișinău') // TODO se foloseste pentru geolocatie si nu avem nevoie de isCity
            $constituency = Constituency::whereHas('locality', function ($q) use ($request) {
                $q->where('name', 'like', '%'. $request->get('route') .'%');
            })->first();
        else
            $constituency = Constituency::whereHas('locality', function ($q) use ($request) {
                $q->where('name', 'like', '%'. $request->get('locality') .'%');
            })->first();
        if ($constituency == NULL) {
            $geoip = new GeoIPLocation();
            print_r($geoip->getCity());
            if (($locality = Locality::where('name', 'like', '%'.Str::lower($geoip->getCity()).'%')->first()) != NULL)
                return response()->json($locality->constituency);
            else
                return response()->json(NULL);
        }
        $languageConstituency = LanguageConstituencies::where('constituency_id', $constituency->constituency_name)
        ->where('language', $locale)
        ->first();
        return response()->json(['constituency' => [$constituency, $languageConstituency]]);
    }
}
