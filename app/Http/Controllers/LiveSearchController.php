<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LiveSearchController extends Controller
{
    function index()
    {
        return view('live_search');
    }

    function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('locality')->where('name', 'like', '%' . $query . '%')->get();
            } else {
                $data = DB::table('locality')->orderBy('id', 'desc')->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= $row->name.'<br>';
                }
            } else {
                $output = 'No Data Found';
            }
            $data = array('table_data' => $output, 'total_data' => $total_row);
            echo json_encode($data);
        }
    }
}
