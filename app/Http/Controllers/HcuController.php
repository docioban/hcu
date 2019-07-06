<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Http\Requests\Adress;
use App\Language;
use App\Post;
use App\Candidate;
use App\Constituency;
use App\LanguageConstituencies;
use App\LanguageLocality;
use TCG\Voyager\Models\Translation;

class HcuController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //todo e mai corect sa trimiteti prin headers locale, si sa faceti un middleware pentru a seta limba pentru aplicatie
	//todo de exemplu asa : app('translator')->setLocale($language_id) sau alte solutii din laravel, mai erau cu siguranta
	//todo dar asta nui critic, pentru data asta se accepta
	//todo lispeste search dupa IP address. Ma intrebati si va explic cum se poate de realizat
	public function index($locale, Adress $request)//todo action-ul ista trebuie sa fie in controller aparter, care raspunde doar de search, sau search dupa localitati.
    {
        $constituency = null;
		//todo $request->input('locality') este si asa posibilitate, de alt fel pentru ce mai este nevie de $request daca nici nul utilizati.
		//todo Input::get('locality') == 'Chisinau' asta nu merge, la locality, in model trebuie de pus flag, is_city de exemplu.
        if (Input::get('locality') == 'Chisinau' && Input::get('route') == '')
            $constituency = Constituency::whereHas('locality', function ($q) {
                $q->where('name', 'like', '%'. Input::get('locality') .'%');
            })->first(); // todo folositi acoladele la if, chiar daca e o singura actiune in el. studiati codestyle PSR2
        elseif (Input::get('locality') == 'Chisinau' && Input::get('route') != '')
            $constituency = Constituency::whereHas('locality', function ($q) {
                $q->where('name', 'like', '%'. Input::get('route') .'%');//todo route poate fi litere mari sau mici, in baza la fel, trebuie adus tot la un format, name ar fi ok sal faceti LOWER(`name`) si route in strtolower. asta se refera la tot search-ul, trebuie prevazute toate cazurile. Orice LIKE in baza are asa riscuri.
            })->first();
        elseif (Input::get('locality') != '' && Input::get('route') == '')
            $constituency = Constituency::whereHas('locality', function ($q) {
                $q->where('name', 'like', '%'. Input::get('locality') .'%');
            })->first();

        $language = Language::where('name', $locale)->first();//todo nu vad sens in request-ul ista la baza, se putea de facut in urmatorul request un where cu join.

        $langconstituency = LanguageConstituencies::where('constituency_id', $constituency->constituency_name)->where('language_id', $language->id)->first(); //todo aici trebuia de pus la constituency in request with, si sa indici limba care iti trebuie.
		//todo relatia entitatilor cu language model trebuie facut nu prin id, dar language code, care este standardizat si unic pentru fiecare limba
		//todo in general in model la Constituency se poate de facut un method care sa returneze in baza de limba setata in aplicatie doar relatia cu LanguageConstituency

        return response()->json(['constituency' => $constituency, 'translate' => $langconstituency]);//todo un endpoint cand returneaza un obiect, translate, sau alte atribute a lui, trebuie sa fie in el insusi, nu aparte, asta face confuzie pentru cei ce citesc raspunsul: trebuie sa fie undeva asa:

		//todo exemplu:
		/*
		 * {
		 * constituency: {
		 * id:1,
		 * name:'name',
		 * translate:{
		 * translate_object_id:1
		 * }
		 * }
		 * }
		 *
		 * */
    }

    public function constituency($locale, $slug)
    {
        $constituency = Constituency::whereSlug($slug)->firstOrFail();

        $language = Language::where('name', $locale)->first();//todo despre language am mai scris.

        $langconstituency = LanguageConstituencies::where('constituency_id', $constituency->constituency_name)->where('language_id', $language->id)->first();//todo aici cu relatia tot am zis.

        $locality = LanguageLocality::whereHas('locality', function ($q) use ($constituency) {
            $q->where('constituency_id', $constituency->constituency_name);
        })->where('language_id', $language->id)->get();

        $candidates = Candidate::where('constituency_id', $constituency->constituency_name)->get();//todo era mai bine prin relatie.

        return response()->json([
            'constituency' => $constituency,
            'langconstituency' => $langconstituency,
            'locality' => $locality,
            'candiates' => $candidates
        ]);//todo despre tot am zis
    }

    //todo exemplu din proiectul de pe live, cum am facut eu endpointul ista:
	//todo si eu nu am folosit middleware pentru limba, o faceam in fiecare endpoint, e mai optim cu middleware.

	/*
	 *
	 *  public function itemBySlug($language_id, $slug)
	 *	{
	 *		app('translator')->setLocale($language_id);
	 *		return response()->json(District::with(['descriptions'])->where('slug', '=', $slug)->firstOrFail());
	 *	}
	 * */

    public function candidate($locale, $slug)
    {
        $candidate = Candidate::whereSlug($slug)->firstOrFail();

        $language = Language::where('name', $locale)->first();

        $posts = Post::where('candidate_id', $candidate->id)->where('language_id', $language->id)->get();


        return response()->json([$candidate, $posts]);
    }

    public function constituency_all($locale)
    {
        $language = Language::where('name', $locale)->first();

        $constituencies = LanguageConstituencies::where('language_id', $language->id)->get();

        return response()->json($constituencies);
    }


    //todo in restul endpointurilor sunt aceliasi probleme. si separati pe conttrolere diferite, nu lasati asa.
	//todo daca merge vorba despre candidati faci controller aparte pentru endpointurile legate de dansul, daca returneaza circumscriptii, tot aparte,
	//todo acum controllerul asta nui mare, si nu are multe endpointuri, dar va mai zis 2 sarcini, si o sa fie insuportabil sa mai intelegi ceva aici.

}
