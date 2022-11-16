<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use validator;
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
      
            if($request->ajax()){
              
                $query = DB::table('information')
                ->join('files','files.information_id','=','information.id')->get();
            //    dd($query);
                return Datatables::of($query)
                // ->addIndexColumn()
                ->addColumn('image',function($image){
                   
                    $url = asset('/images/test'.$image->images);
                   
                    return '<img src="'.$url.'" style="width:40px;" class="img-rounded" align="center" />';
                })
                ->addColumn('actions', function($row){

                    // $btn = '<a href="#" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edibutton">Edit</a>';
                    $btn =' <button type="button" class="btn btn-success editbutton" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                   Edit
                  </button>';

                    $btn = $btn.' <a href="#" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletebutton">Delete</a>';

                        return $btn;
                })
                ->rawColumns(['image','actions'])
                ->make(true);
                // return DataTables::of(Information::all())->make(true);
            }

     }

     //store info
     public function store_info(Request $request)
     {
      
        $validator = $request->validate([
                    'user_name'=>'required',
                    'email'=>'required|email|unique:information',
                    'gender'=>'required',
                    'qualification'=>'required',
                    'birthday'=>'required',
                    'status'=>'required',
                    'desc'=>'required'
                ],
                [
                    'user_name.required'=>'User name is required',
                    
                ]
            );

   

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
            // dd($request->all());
             $request->validate([
                'user_name'=>'required',
                'email'=>'required|email',
                'gender'=>'required',
                'qualification'=>'required',
                'birthday'=>'required',
                'status'=>'required',
                'desc'=>'required',
            ],
            [
                'user_name.required'=>'User name is required',
                'desc.required'=>'Short description is required',
                
            ]
        );
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
        
       
