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
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($locale, Adress $request)
    {
        $constituency = null;

        if (Input::get('locality') == 'Chisinau' && Input::get('route') == '')
            $constituency = Constituency::whereHas('locality', function ($q) {
                $q->where('name', 'like', '%'. Input::get('locality') .'%');
            })->first();
        elseif (Input::get('locality') == 'Chisinau' && Input::get('route') != '')
            $constituency = Constituency::whereHas('locality', function ($q) {
                $q->where('name', 'like', '%'. Input::get('route') .'%');
            })->first();
        elseif (Input::get('locality') != '' && Input::get('route') == '')
            $constituency = Constituency::whereHas('locality', function ($q) {
                $q->where('name', 'like', '%'. Input::get('locality') .'%');
            })->first();

        $language = Language::where('name', $locale)->first();

        $langconstituency = LanguageConstituencies::where('constituency_id', $constituency->constituency_name)->where('language_id', $language->id)->first();

        return response()->json(['constituency' => $constituency, 'translate' => $langconstituency]);

    }

    public function constituency($locale, $slug)
    {
        if (is_numeric($slug)) {

            $constituency = Constituency::findOrFail($slug);

            return redirect($locale . '/constituency/' . $constituency->slug);
        }

        $constituency = Constituency::whereSlug($slug)->firstOrFail();

        $language = Language::where('name', $locale)->first();

        $langconstituency = LanguageConstituencies::where('constituency_id', $constituency->constituency_name)->where('language_id', $language->id)->first();

        $locality = LanguageLocality::whereHas('locality', function ($q) use ($constituency) {
            $q->where('constituency_id', $constituency->constituency_name);
        })->where('language_id', $language->id)->get();

        $candidates = Candidate::where('constituency_id', $constituency->constituency_name)->get();

        return response()->json([
            'constituency' => $constituency,
            'langconstituency' => $langconstituency,
            'locality' => $locality,
            'candiates' => $candidates
        ]);
    }

    public function candidate($locale, Candidate $candidate)
    {
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
}
