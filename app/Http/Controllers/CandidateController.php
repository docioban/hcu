<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Post;

class CandidateController extends Controller
{
    public function candidate($locale, $slug)
    {
        $candidate = Candidate::whereSlug($slug)->first();

        $posts = Post::where('language', $locale)->get();

        $candidate->posts = $posts;

        return response()->json($candidate);
    }
}
