<?php

namespace App\Http\Controllers;

use App\Candidate;

class CandidateController extends Controller
{
    public function candidate($locale, $slug)
    {
        $candidate = Candidate::whereSlug($slug)->with('posts')->first();

        return response()->json($candidate);
    }
}
