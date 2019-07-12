<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Post;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * @param $locale
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function candidate($locale, $slug)
    {
        $candidate = Candidate::whereSlug($slug)->firstOrFail();

        return response()->json($candidate->description());
    }

    public function update(Request $request, $id) {
        $candidate = Candidate::find($id);
        $candidate->name = $request->input('name');
        $candidate->surname = $request->input('surname');
        $candidate->party_id = $request->input('party_id');
        $candidate->constituency_id = $request->input('constituency_id');
        $candidate->slug = $request->input('slug');
        $candidate->location = $request->input('location');
        $candidate->_statu = $request->input('civil_status');
        $candidate->function = $request->input('function');
        $candidate->studies = $request->input('studies');
        $candidate->date = $request->input('date');
//        $candidate->save();
        $posts = Post::where('candidate_id', $id)->get();
        foreach ($posts as $post) {
            $post->lanugage = $request->input('language');
            $post->type = $request->input('type');
            $post->title = $request->input('title');
            $post->subtitle = $request->input('subtitle');
            $post->body = $request->input('body');
//            $post->save();
        }
        dd($request->input(''));
        return response()->json($request);
    }
}
