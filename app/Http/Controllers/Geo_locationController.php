<?php

namespace App\Http\Controllers;

use App\Locality;
use App\LanguageConstituencies;
use Illuminate\Support\Str;
use Victorybiz\GeoIPLocation\GeoIPLocation;
use App\Http\Requests\AddressRequest;

class Geo_locationController extends Controller
{
    public function index($locale, AddressRequest $request)
    {
        if ((Locality::where('isCity', 1)->exists()) && ($request->get('route') != '')) // TODO se foloseste pentru geolocatie si nu avem nevoie de isCity
            $locality = Locality::where('name', Str::lower($request->get('route')))->first();
        else
            $locality = Locality::where('name', Str::lower($request->get('locality')))->first();

        if (!$locality) {
            $geoip = new GeoIPLocation();
            if (($locality = Locality::where('name', 'like', '%'.Str::lower($geoip->getCity()).'%')->first()) != NULL)
                return response()->json($locality->constituency);
            else
                return response()->json(null);
        }
        $constituency = $locality->constituency;
        $constituency->langiage_constituencies = LanguageConstituencies::where('constituency_id', $constituency->constituency_name)
        ->where('language', $locale)
        ->first();
        return response()->json($constituency);
    }
}
