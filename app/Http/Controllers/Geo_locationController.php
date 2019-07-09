<?php

namespace App\Http\Controllers;

use App\Locality;
use Illuminate\Http\Request;
use App\LanguageConstituencies;
use Illuminate\Support\Str;
use Victorybiz\GeoIPLocation\GeoIPLocation;
use App\Http\Requests\AddressRequest;

class Geo_locationController extends Controller
{
    public function index($locale, AddressRequest $request)
    {
        if ($request->get('locality') == 'Chișinău') // TODO se foloseste pentru geolocatie si nu avem nevoie de isCity
            $locality = Locality::where('name', Str::lower($request->get('route')))->first();
        else
            $locality = Locality::where('name', Str::lower($request->get('locality')))->first();
        if ($locality)
            $constituency = $locality->constituency;
        else {
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
