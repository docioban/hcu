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
        $output = '';
        $language = Language::where('name', $locale)->first();
        $query = $request->get('query');
        if ($query) {
            $constituencies = LanguageConstituencies::where('name', 'like', '%'.$query.'%')->get();
            $candidates = Candidate::where('name', 'like', '%'.$query.'%')->get();
            $sections = Section::where('address', 'like', '%'.$query.'%')->get();
        } else {
            $constituencies = LanguageConstituencies::where('language_id', $language->id)->paginate(10);
            $candidates = Candidate::paginate(10);
            $sections = Section::paginate(10);
        }
        foreach ($candidates as $candidate) {
            $output .= '
                <tr>
                    <td>'.$candidate->name.'</td>
                </tr>
            ';
        }
        foreach ($constituencies as $constituency) {
            $output .= '
                <tr>
                    <td>'.$constituency->name.'</td>
                </tr>
            ';
        }
        foreach ($sections as $section) {
            $output .= '
                <tr>
                    <td>'.$section->address.'</td>
                </tr>
            ';
        }
        echo json_encode($output);
    }
}
