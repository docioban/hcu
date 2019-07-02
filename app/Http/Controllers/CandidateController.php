<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Constituencies;
use App\Language;
use App\LanguageConstituencies;
use App\Party;
use App\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidateController extends Controller
{/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index()
    {
        $candidates = Candidate::all();
        return view('crud.candidate.candidate_list')->with('candidates', $candidates);
//        return response()->json($candidates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = Language::where('name', app()->getLocale())->first();
        $parties = Party::all();
        $constituencies = LanguageConstituencies::where('language_id', $language->id)->get();
        return view("crud.candidate.candidate_create")->with(['parties' => $parties, 'constituencies' => $constituencies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($locale, Request $request)
    {
        $candidate = new Candidate;
        $candidate->constituency_id = $request->input('constituency_id');
        $candidate->party_id = $request->input('party_id');
        $candidate->name = $request->input('name');
        $candidate->location = $request->input('location');
        $candidate->civil_status = $request->input('civil_status');
        $candidate->function = $request->input('function');
        $candidate->date = $request->input('date');
        $candidate->studies = $request->input('studies');
        $candidate->save();
        return redirect(app()->getLocale()."/candidate")->with('success', 'Candidate was add from success');
//        return response()->json($candidate);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show($locale, $id)
    {
        $candidate = Candidate::find($id);
        return view('crud.candidate.candidate_show')->with('candidate', $candidate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, $id)
    {
        $language = Language::where('name', $locale)->first();
        $candidate = Candidate::find($id);
        $parties = Party::all();
        $constituencies = LanguageConstituencies::where('language_id', $language->id)->get();
        return view('crud.candidate.candidate_edit')->with(['candidate' => $candidate, 'parties' => $parties, 'constituencies' => $constituencies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update($locale, Request $request, Candidate $candidate)
    {
        $candidate->name = $request->input('name');
        $candidate->location = $request->input('location');
        $candidate->civil_status = $request->input('civil_status');
        $candidate->function = $request->input('function');
        $candidate->date = $request->input('date');
        $candidate->constituency_id = $request->input('constituency_id');
        $candidate->studies = $request->input('studies');
        $candidate->save();
        return view('crud.candidate.candidate_show')->with(['candidate' => $candidate, 'success' => 'Was updated with success']);
//        return redirect("en/candidate/".$candidate->id);
//        return response()->json($candidate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, Candidate $candidate)
    {
        $posts = Posts::where('candidate_id', $candidate->id)->get();
        foreach ($posts as $post) {
            $post->post_content()->delete();
        }
        foreach ($posts as $post) {
            $post->delete();
        }
        $candidate->delete();
        return redirect(app()->getLocale().'/candidate')->with('success', 'Candidate was deleted with success');
//        return response()->json(['message' => 'deleted']);
    }
}
