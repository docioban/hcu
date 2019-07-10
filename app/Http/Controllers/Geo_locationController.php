<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Victorybiz\GeoIPLocation\GeoIPLocation;
use App\Http\Requests\AddressRequest;
use App\LanguageLocality;

class Geo_locationController extends Controller
{
    public function index($locale, AddressRequest $request)
    {
        $lanuage_locality = LanguageLocality::where('name', Str::lower($request->get('route')))->first();

        if (($request->get('route') == '') || !($lanuage_locality)) {
            $lanuage_locality = LanguageLocality::where('name', Str::lower($request->get('locality')))->first();
        }

        if ((!$lanuage_locality) || (!$lanuage_locality)) {

            $geoip = new GeoIPLocation();
            $lanuage_locality = LanguageLocality::where('name', Str::lower($geoip->getCity()))->first();
        }

        return response()->json($lanuage_locality->locality->constituency);
    }
}