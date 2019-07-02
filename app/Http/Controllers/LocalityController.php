<?php

namespace App\Http\Controllers;

use App\Locality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localities = Locality::paginate(50);
        return view('crud.locality.locality_list')->with('localities', $localities);
//        return response()->json($locality);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $locality = new Locality;
        $locality->district_id = $request->district_id;
        $locality->constituency_id = $request->constituency_id;
        $locality->name = $request->name;
        $locality->save();
        return response()->json($locality);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function show($locale, Locality $locality)
    {
        return response()->json($locality);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function edit(Locality $locality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function update($locale, Request $request, Locality $locality)
    {
        $locality->district_id = $request->district_id;
        $locality->constituency_id = $request->constituency_id;
        $locality->name = $request->name;
        $locality->save();
        return response()->json($locality);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, Locality $locality)
    {
        $locality->language_locality()->delete();
        $locality->section()->delete();
        $locality->delete();
        return response()->json(['message' => 'deleted']);
    }
}
