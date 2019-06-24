<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\InstitutieImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new InstitutieImport,request()->file('file'));
           
        return back();
    }
}
