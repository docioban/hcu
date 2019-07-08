<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function candidate($locale, $slug)
    {
        $candidate = Candidate::whereHas('posts', function ($q) use ($locale) {
            $q->where('language', $locale);
        })->with('posts')->first();

        if ($candidate == null) 
            $candidate = Candidate::()

        // $candidate = Candidate::whereSlug($slug)
        // ->with('posts')
        // ->where('language', )
        // ->firstOrFail();

        // $language = Language::where('name', $locale)->first();

        return response()->json($candidate);    
    }
}
