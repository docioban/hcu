<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeputatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::all();
        return response()->json($candidates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidate = new Candidate;
        $candidate->name = $request->input('name');
        $candidate->location = $request->input('location');
        $candidate->civil_status = $request->input('civil_status');
        $candidate->function = $request->input('function');
        $candidate->date = $request->input('date');
        $candidate->constituency_id = $request->input('constituency_id');
        $candidate->studies = $request->input('studies');
        $candidate->save();
        return response()->json($candidate);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show($locale, Candidate $candidate)
    {
        return response()->json($candidate);
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
        print_r($request);exit;
        $candidate->name = $request->input('name');
        $candidate->location = $request->input('location');
        $candidate->civil_status = $request->input('civil_status');
        $candidate->function = $request->input('function');
        $candidate->date = $request->input('date');
        $candidate->constituency_id = $request->input('constituency_id');
        $candidate->studies = $request->input('studies');
        $candidate->save();
        return response()->json($candidate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
//        $posts =
//        $candidate->delete();
        return response()->json(['message' => 'deleted']);
    }
}
