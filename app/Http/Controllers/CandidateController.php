<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Http\Requests\UpdateCandidatePosts;
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

    public function store(Request $request) {

        return response()->json($request);
    }

    /**
     * @param Request $request
     * @param Candidate $candidate
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCandidatePosts $request, Candidate $candidate ) {
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
        if ($request->file('cv') != null) {
            $request->file('cv')->storeAs('public/candidates/doc', $request->input('surname').'_'.$request->input('name').'.doc');
        }
        if ($request->file('photo') != null) {
            $request->file('photo')->storeAs('public/candidates/img', $request->input('surname').'_'.$request->input('name').'.jpg');
        }
//        $candidate->save();
        $posts = $candidate->Posts();
        foreach ($posts as $post) {
            if ($post->type == -1) {
                $post->delete();
            } else {
                $post->type = $request->input('type_'.$post->id);
                $post->title = $request->input('title_'.$post->id);
                $post->subtitle = $request->input('subtitle_'.$post->id);
                $post->body = $request->input('body_'.$post->id);
//               $post->save();
            }
        }
        $id = 1;
        while ($request->has('new_title_'.$id) && $request->has('new_subtitle_'.$id) && $request->has('new_body_'.$id) && $request->has('new_type_'.$id)) {
            if ($request->input('new_title_'.$id) != "" && $request->input('new_subtitle_'.$id) != "" && $request->input('new_body_'.$id) != "" && $request->input('new_type_'.$id) != "") {
                $new_post = new Post();
                $new_post->candidate_id = $candidate->id;
                $new_post->type = $request->input('new_type_'.$id);
                $new_post->title = $request->input('new_title_'.$id);
                $new_post->subtitle = $request->input('new_subtitle_'.$id);
                $new_post->body = $request->input('new_body_'.$id);
//               $new_post->save();
            }
            $id++;
        }
        return response()->json($candidate);
    }
}
