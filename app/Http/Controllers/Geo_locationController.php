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
        if (($request->get('route') == '') || ($locality = Locality::where('isCity', 1)->where('name', Str::lower($request->get('route')))->with('constituency')->first()) == NULL) // TODO se foloseste pentru geolocatie si nu avem nevoie de isCity
            $locality = Locality::where('name', Str::lower($request->get('locality')))->with('constituency')->first();

        if (!$locality) {
            $geoip = new GeoIPLocation();
            if (($locality = Locality::where('name', Str::lower($geoip->getCity()))->with('constituency')->first()) != NULL) {
                return response()->json($locality->constituency);
            } else
                return response()->json(null);
        }
        return response()->json($locality->constituency);
    }
}