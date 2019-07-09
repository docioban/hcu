<?php

namespace App\Http\Controllers;

use App\Constituency;

class ConstituencyController extends Controller
{
    public function constituency($locale, $slug)
    {
        $constituency = Constituency::whereSlug($slug)
        ->with('language_constituencies')
        ->with('locality.language_locality')
        ->with('candidate')
        ->firstOrFail();

        return response()->json($constituency);
    }

    public function constituency_all($locale)
    {
       // return ConstituenciesResource::collection(Constituency::all());

       return response()->json(Constituency::with('language_constituencies')->get());

    }
}
