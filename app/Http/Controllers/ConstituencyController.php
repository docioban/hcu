<?php

namespace App\Http\Controllers;

use App\Constituency;

class ConstituencyController extends Controller
{
    public function constituency($locale, $slug)
    {
        $constituency = Constituency::whereSlug($slug)->firstOrFail();   

        return response()->json($constituency->description());
    }

    public function constituency_all($locale)
    {
        return response()->json(Constituency::all());
    }
}
