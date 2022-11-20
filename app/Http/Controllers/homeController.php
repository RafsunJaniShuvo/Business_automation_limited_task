<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class homeController extends Controller
{

    public function manage()
    {
        $info = Information::all();
      
        return view('home.manage');
    }

    public function getData(Request $request)
    {    
    
        if($request->ajax()){
            
            $query = DB::table('information')
            ->leftJoin('files','files.information_id','=','information.id')->get();
               
            return Datatables::of($query)
            // ->addIndexColumn()
            ->addColumn('image',function($image){
                
                $url = asset('/images/test'.$image->images);
                
                return '<img src="'.$url.'" style="width:80px;" class="img-fluid" align="center" />';
            })
            ->addColumn('actions', function($row){

               
                $btn =' <button type="button" class="btn btn-success editbutton" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                <i class="fa-solid fa-pen-to-square"></i>
                </button>';

                $btn = $btn.' <a href="#" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger deletebutton"><i class="fa-solid fa-trash"></i></a>';

                    return $btn;
            })
            ->rawColumns(['image','actions'])
            ->make(true);
            // return DataTables::of(Information::all())->make(true);
        }
        return false;

    }

    //store info
    public function store_info(Request $request)
    {
        dd($request->all());
       

    // $validator = $request->validate([
    //             'user_name'=>'required',
    //             'email'=>'required|email|unique:information',
    //             'gender'=>'required',
    //             'qualification'=>'required',
    //             'birthday'=>'required',
    //             // 'status'=>'required',
    //             'desc'=>'required',
    //         ],
    //         [
    //             'user_name.required'=>'User name is required',
    //             'email.required'=>'Email has to be unique',
    //             'gender.required'=>'Gender is required',
    //             'qualification.required'=>'Qualification is required',
    //             'birthday.required'=>'birth date is required',
    //         ]
    //     );


        try {

           DB::beginTransaction();
           $info = new Information();
           $info->user_name=$request->name;
           $info->email=$request->email;
           $info->gender=$request->gender;
           $info->qualification=$request->qualification;
           $info->birthday=$request->birthday;
           $info->status= $request->status;
           $info->description=$request->desc;
           $info->save();
           $file = new File();
           $file->information_id = $request->id;
           $file->images = $request->images;


           


           DB::commit();
        
        }
        catch (\Throwable $e) {
            DB::rollBack();
           
        }
     
    
        return response()->json([
            'status' => 'success', 
            'messages' => "Data saved Successfully"
        ]);


    }


    public function edit_info($id)
    {
        $info =Information::find( $id);
        return response()->json($info);
    }

    public function update_info(Request $request,$id)
    {
        
            $request->validate([
            'user_name'=>'required',
            'email'=>'required|email',
            'gender'=>'required',
            'qualification'=>'required',
            'birthday'=>'required',
            // 'status'=>'required',
            'desc'=>'required',
        ],
        [
            'user_name.required'=>'User name is required',
            'email.required'=>'Email is required!!',
            'gender.required'=>'Gender is required',
            'qualification.required'=>'Qualification is required',
            'birthday.required'=>'Birthday is required',
            'desc.required'=>'Short description is required',
            
        ]);

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
        
       
