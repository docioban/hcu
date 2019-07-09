<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Post;

class CandidateController extends Controller
{
    public function candidate($locale, $slug)
    {
    	//todo studiati cum lucreaza with la modele, si cum sa adaugi fielduri care nusi in baza
        $candidate = Candidate::whereSlug($slug)->first();

        $posts = Post::where('language', $locale)->get();

        $candidate->posts = $posts;

        return response()->json($candidate);
    }
}
