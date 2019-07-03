<?php

namespace App\Http\Controllers;

use App\LanguageConstituencies;
use App\Language;
use App\Locality;
use App\Candidate;
use App\Constituency;
use App\Http\Requests\Constituency_store;
use App\Http\Requests\Constituency_update;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConstituencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {
        $language = Language::where('name', $locale)->first();

        $constituencies = LanguageConstituencies::where('language_id', $language->id)->get();

        return view('crud.constituency.constituency_list')->with(['constituencies' => $constituencies]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Constituency_store $request)
    {
        $constituency = new Constituency();

        $constituency->constituency_name  = $request->input('constituency_name');
        $constituency->slug = 'circumscriptie-' . $request->input('constituency_name');
        $constituency->number_of_voters = $request->input('numbers_of_voters');
        $constituency->save();

        $language_constituencies = new LanguageConstituencies();
        $language_constituencies->language_id = 1;
        $language_constituencies->constituency_id = $request->input('constituency_name');
        $language_constituencies->name = $request->input('name_ro');
        $language_constituencies->save();

        $language_constituencies = new LanguageConstituencies();
        $language_constituencies->language_id = 2;
        $language_constituencies->constituency_id = $request->input('constituency_name');
        $language_constituencies->name = $request->input('name_ru');
        $language_constituencies->save();

        return  redirect(app()->getLocale() . '/constituency')->with(['success' => 'Circumscriptia a fost creata']);
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

        $language = Language::where('name', $locale)->first();

        $constituency = LanguageConstituencies::find($language->id);

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
    public function edit(Constituency_update $constituencies)
    {
        return view('crud.constituency.constituency_edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Constituencies $constituencies
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Constituencies $constituencies)
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
