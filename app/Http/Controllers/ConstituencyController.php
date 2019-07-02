<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\Locality;
use App\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConstituencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $constituencies = Constituency::all();

        return view('crud.constituency.constituency_list')->with(['constituencies' => $constituencies]);

        //return response()->json($constituencies);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Constituency_store $request)
    {
        $constituency = Constituency::create($request->all());

        return response()->json($constituency, 201);
    }

    public function create()
    {
        return view('crud.constituency.constituency_create');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Constituencies $constituencies
     * @return \Illuminate\Http\Response
     */
    public function show($locale, Constituency $constituency)
    {
        $localities = Locality::where('constituency_id', $constituency->id)->get();

        $candidates = Candidate::where('constituency_id', $constituency->id)->get();

        $constituency = Constituency::find($constituency->id);

        //return $localities;

        return view('crud.constituency.constituency_show')->with(['constituency' => $constituency, 'localities' => $localities, 'candidates' => $candidates]);

        //return response()->json($constituency);

        // if (is_numeric($slug)) {

        //     return 'fuck';

        //     $constituency = Constituency::findOrFail($slug);

        //     return Redirect::to(route('constituency.show', $constituency->slug), 301);
        // }

        // $constituency = Constituency::whereSlug($slug)->firstOrFail();

        // return $constituency;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Constituencies $constituencies
     * @return \Illuminate\Http\Response
     */
    public function edit(Constituencies $constituencies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Constituencies $constituencies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Constituencies $constituencies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Constituencies $constituencies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Constituencies $constituencies)
    {
        //
    }
}
