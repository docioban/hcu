<?php

namespace App\Http\Controllers;

use App\Constituence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConstituenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Constituencies  $constituencies
     * @return \Illuminate\Http\Response
     */
    public function show(Constituence $constituencies)
    {
        dd($constituencies->id);

        //return $constituencies;

        $constituence = Constituence::where('id', $constituencies->id)->with('candidate')->with('locality')->first();

        return response()->json($constituence);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Constituencies  $constituencies
     * @return \Illuminate\Http\Response
     */
    public function edit(Constituencies $constituencies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Constituencies  $constituencies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Constituencies $constituencies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Constituencies  $constituencies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Constituencies $constituencies)
    {
        //
    }
}
