<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Constituencies;
use App\Http\Requests\Adress;
use App\Language;
use App\LanguageConstituencies;
use App\Locality;
use App\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LiveSearchController extends Controller
{
    function index()
    {
        return view('live_search');
    }

    function action($locale, Request $request)
    {
        $output = '';//todo nu lasati variabile care nu se folosesc, asta denota lipsa de profesionalism
        $language = Language::where('name', $locale)->first();//todo despre limba am mai zis.
        $query = $request->get('query');
        if ($query) {
            $constituencies = LanguageConstituencies::where('name', 'like', '%'.$query.'%')->get();//todo fiti atenti la spatii si mai multe cuvinte cand faceti search. despre like in baza am mai zis.
            $candidates = Candidate::where('name', 'like', '%'.$query.'%')->get();
            $sections = Section::where('address', 'like', '%'.$query.'%')->get();
        } else {
            $constituencies = LanguageConstituencies::where('language_id', $language->id)->paginate(10);
            $candidates = Candidate::paginate(10);
            $sections = Section::paginate(10);//todo get si paginate returneaza raspunsuri diferite. studiati cum lucreaza paginarea.
        }

        //todo nu lasati comentarii care nu trebuiesc, daca aveti nevoie de asta pe viitor, strieti un todo cu indicatii si explicatii.
        // print response in view
//        foreach ($candidates as $candidate) {
//            $output .= '
//                <tr>
//                    <td>'.$candidate->name.'</td>
//                </tr>
//            ';
//        }
//        foreach ($constituencies as $constituency) {
//            $output .= '
//                <tr>
//                    <td>'.$constituency->name.'</td>
//                </tr>
//            ';
//        }
//        foreach ($sections as $section) {
//            $output .= '
//                <tr>
//                    <td>'.$section->address.'</td>
//                </tr>
//            ';
//        }
//        echo json_encode($output);
        return response()->json(['candidates' => $candidates, 'constituencies' => $constituencies, 'sections' => $sections]);
    }
}
