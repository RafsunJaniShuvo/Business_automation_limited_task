<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

class homeController extends Controller
{
    public function create()
    {
        echo "ok";
    }

    public function manage()
    {
        $info = Information::all();

    //    if($info->count()>0){
    
    //        return view('home.manage');
        
    //    }
    //    return "Table has no data";
    return view('home.manage');
    }

    public function getData(Request $request)
    {
        // $query = Information::all();
        // return DataTables::of(Information::all())->make(true);
            if($request->ajax()){
                $query = Information::all();
                return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('actions', function($row){

                    // $btn = '<a href="#" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edibutton">Edit</a>';
                    $btn =' <button type="button" class="btn btn-success editbutton" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                   Edit
                  </button>';

                    $btn = $btn.' <a href="#" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletebutton">Delete</a>';

                        return $btn;
                })
                ->rawColumns(['actions'])
                ->make(true);
                // return DataTables::of(Information::all())->make(true);
            }

     }

     //store info
     public function store_info(Request $request)
     {
    //     $request->validate([
    //         'user_name'=>'required',
    //         'email'=>'required|email|unique:information',
    //         'gender'=>'required',
    //         'qualification'=>'required',
    //         'birthday'=>'required',
    //         'status'=>'required',
    //         'description'=>'required',
           
    //     ]
    // ,[
    //     'user_name.required ' =>'User name is required',
    //     'email.required'=>'Email is required',
    //     'gender.required'=>'Gender is required',
    //     'qualification.required'=>'Qualification is required',
    // ]);
        // print_r($request->toArray());
        // return response()->json($request->toArray());
        $info = new Information();
        $info->user_name=$request->user_name;
        $info->email=$request->email;
        $info->gender=$request->gender;
        $info->qualification=$request->qualification;
        $info->birthday=$request->birthday;
        $info->status= $request->status;
        $info->description=$request->desc;
        $info->save();
        return response()->json([
            'status'=>'success'
        ]);
        }

        public function edit_info($id)
        {
            $info =Information::find( $id);
            return response()->json($info);
        }

        public function update_info(Request $request,$id)
        {
            $info = Information::find($id);
            $info->user_name=$request->user_name;
            $info->email=$request->email;
            $info->gender=$request->gender;
            $info->qualification=$request->qualification;
            $info->birthday=$request->birthday;
            $info->status= $request->status;
            $info->description=$request->desc;
            $info->update();
            return response()->json([
                'status'=>'success'
            ]);
        }

        public function delete_info($id)
        {
            $info = Information::find($id);
            $info->delete();
            return response()->json([
                'status'=>'success'
            ]);
        }
    
}
        
       
