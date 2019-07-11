<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\LanguageConstituencies;
use App\Section;
use Illuminate\Http\Request;

class LiveSearchController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index()
    {
        return view('live_search');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    function action(Request $request)
    {
        $query = $request->get('query');
        if ($query) {
            $constituencies = LanguageConstituencies::where('name', 'like', '%' . $query . '%')->with('constituency')->take(10)->get();
            $candidates = Candidate::where('name', 'like', '%' . $query . '%')->take(10)->get();
            $sections = Section::where('address', 'like', '%' . $query . '%')->take(10)->get();
        }
        return response()->json(['candidates' => $candidates ?? [], 'constituencies' => $constituencies ?? [], 'sections' => $sections ?? []]);
    }
}
