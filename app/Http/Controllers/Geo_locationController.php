<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Victorybiz\GeoIPLocation\GeoIPLocation;
use App\Http\Requests\AddressRequest;
use App\LanguageLocality;

class Geo_locationController extends Controller
{
    /**
     * @param $locale
     * @param AddressRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(AddressRequest $request)
    {
        $language_locality = LanguageLocality::where('name', Str::lower($request->get('route')))
            ->whereHas('locality', function ($q) {
                $q->where('isCity', 1);
            })->first();

        if (!($language_locality)) {
            $language_locality = LanguageLocality::where('name', Str::lower($request->get('locality')))->first();
        }

        if ((!$language_locality)) {

            $geoip = new GeoIPLocation();
            $language_locality = LanguageLocality::where('name', Str::lower($geoip->getCity()))->first();
        }

        return response()->json($language_locality ? $language_locality->locality : null);
    }
}