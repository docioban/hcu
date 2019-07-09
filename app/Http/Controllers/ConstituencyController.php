<?php

namespace App\Http\Controllers;

use App\Constituency;

class ConstituencyController extends Controller
{
    public function constituency($locale, $slug)
    {
        $constituency = Constituency::whereSlug($slug)->firstOrFail();

        return response()->json($constituency->description($locale));
    }

    public function constituency_all($locale)
    {
        $constituencies = Constituency::with(get_constituency_lang($locale))->get(); //todo in proces de dezvoltare

        return response()->json($constituencies);
    }
}
