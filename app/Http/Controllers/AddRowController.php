<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddRowController extends Controller
{
    public function create(){
        return view('addRow.row');
    }

   public function addrow(Request $request){
        $store = $request->jsoninput;
        $data['count'] = $request->get('count');
        $data['name'] = $store['name_type'];
        $data['age'] = $store['age_type'];

       $public_html = strval(view('addRow.addRow',$data));
       return response()->json(['responseCode' => 1, 'html' => $public_html]);
   }
}
