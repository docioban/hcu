<?php

namespace App\Http\Controllers;

use App\Constituency;

class ConstituencyController extends Controller
{
    /**
     * @param $locale
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function constituency($locale, $slug)
    {
        $constituency = Constituency::whereSlug($slug)->firstOrFail();   

        return response()->json($constituency->description());
    }

    /**
     * @param $locale
     * @return \Illuminate\Http\JsonResponse
     */
    public function constituency_all($locale)
    {
        return response()->json(Constituency::all());
    }
}
