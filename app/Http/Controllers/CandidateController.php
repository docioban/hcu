<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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

    /**
     * @param Request $request
     * @param Candidate $candidate
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Candidate $candidate ) {
        $candidate->name = $request->input('name');
        $candidate->surname = $request->input('surname');
        $candidate->party_id = $request->input('party_id');
        $candidate->constituency_id = $request->input('constituency_id');
        $candidate->slug = $request->input('slug');
        $candidate->location = $request->input('location');
        $candidate->civil_statu = $request->input('civil_status');
        $candidate->function = $request->input('function');
        $candidate->studies = $request->input('studies');
        $candidate->date = $request->input('date');
//        dd($request->file('cv'));
        if ($request->file('cv') != null) {
            $request->file('cv')->storeAs('public/candidates/doc', $request->input('surname').'_'.$request->input('name').'.doc');
        }
        if ($request->file('photo') != null) {
            $request->file('photo')->storeAs('public/candidates/img', $request->input('surname').'_'.$request->input('name').'.jpg');
        }
//        $candidate->save();
        $posts = $candidate->Posts();
        foreach ($posts as $post) {
            if ($post->type = -1) {
                $post->delete();
            } else {
//                $post->lanugage = $request->input('language');
                $post->type = $request->input('type');
                $post->title = $request->input('title');
                $post->subtitle = $request->input('subtitle');
                $post->body = $request->input('body');
//               $post->save();
            }
        }
        if ($request->input('title') != "" && $request->input('subtitle') != "" && $request->input('body') != "" && $request->input('type') != "") {
            $new_post = new Post();
            $new_post->candidate_id = $candidate->id;
//            $new_post->lanugage = $request->input('language');
            $new_post->type = $request->input('type');
            $new_post->title = $request->input('title');
            $new_post->subtitle = $request->input('subtitle');
            $new_post->body = $request->input('body');
//            $new_post->save();
        }
        dd($request->input(''));
        return response()->json($candidate);
    }
}
