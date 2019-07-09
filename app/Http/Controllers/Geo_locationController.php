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
        if ($request->get('locality') == 'Chișinău') // todo, baieti asa nui corect, nu mai faceti nici odata asa. o mai trebuit sa puneti == cu un id din baza.
            $locality = Locality::where('name', Str::lower($request->get('route')))->first();
        else
            $locality = Locality::where('name', Str::lower($request->get('locality')))->first();
        if ($locality)
            $constituency = $locality->constituency;
        else {
            $geoip = new GeoIPLocation();
            print_r($geoip->getCity());
            if (($locality = Locality::where('name', 'like', '%'.Str::lower($geoip->getCity()).'%')->first()) != NULL)
                return response()->json($locality->constituency);//todo de ce aici este return?  raspunsurile la endpointul ista nu trebuie sa fie diferit
            else
                return response()->json(NULL);
        }
        $languageConstituency = LanguageConstituencies::where('constituency_id', $constituency->constituency_name)
        ->where('language', $locale)
        ->first();
        return response()->json(['constituency' => [$constituency, $languageConstituency]]);
    }
}
