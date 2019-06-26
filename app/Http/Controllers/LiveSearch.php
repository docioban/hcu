<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearch extends Controller
{
    function index()
    {
        return view('search');
    }

    function action(Request $request)
    {
        if($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if($query != '') {
                $data = DB::table('instituties')
                    ->where('nume', 'like', '%'.$query.'%')
                    ->orderBy('nume', 'desc')
                    ->get();
            } else {
                $data = DB::table('instituties')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0) {
                foreach($data as $row) {
                    $output .= '
        <tr>
         <td>'.$row->nume.'</td>
         <td>'.$row->sectie.'</td>
        </tr>
        ';
                }
            } else {
                $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );
            return response()->json($data);
//            echo json_encode($data);
        } else
            return response()->json($request);
    }
}
