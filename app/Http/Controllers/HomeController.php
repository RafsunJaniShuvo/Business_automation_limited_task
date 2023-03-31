<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Information;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
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
        }
        return false;

    }

    //store info
    public function store_info(Request $request)
    {
     $validator = $request->validate([
                 'name'=>'required',
                 'email'=>'required|email|unique:information',
                 'gender'=>'required',
                 'qualification'=>'required',
//                 'birthday'=>'required',
                 // 'status'=>'required',
                 'desc'=>'required',
                 'image_upload' => 'required',
                 'image_upload.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
             ],
             [
                 'name.required'=>'User name is required',
                 'email.required'=>'Email has to be unique',
                 'gender.required'=>'Gender is required',
                 'qualification.required'=>'Qualification is required',
//                 'birthday.required'=>'birth date is required',
                 'image_upload.required'=>'Please insert images',
             ]
         );
        try{
            DB::beginTransaction();
            $info = new Information();
            $info->user_name =$request->name;
            $info->email =$request->email;
            $info->gender =$request->gender;
            $info->qualification =$request->qualification;
            $info->birthday =date('Y-m-d', strtotime($request->birthday)) ?? '';
            if($request->status){
                $info->status = $request->status;
            }else{
                $info->status = 0;
            }
            $info->description = $request->desc;
            $info->save();
            if ($request->hasFile('image_upload')) {
                $images = $request->file('image_upload');
                foreach ($images as $image) {
                    $file = new File();
                    $imagesName = $image->getClientOriginalName();
                    $ans= $image->move( public_path().'/images/test', $imagesName);
                    $file->images = '/images/test/'.$imagesName;
                    $file->information_id=$info->id;
                    $file->save();
                }
            }
            DB::commit();
            return response()->json([
                'status' => 'success',
                'messages' => "Data saved Successfully"
            ]);


        }
        catch(\Exception $e){
            dd('File: '.$e->getFile().'Line: '.$e->getLine().'Message :'.$e->getMessage());
            DB::rollback();
        }

    }





    public function edit_info($id){

//      $info =Information::find($id);
//      $file = File::where('information_id','=',$id)->get();
      $result = DB::table('information')->Join('files','information.id','=','files.information_id')
      ->where('files.information_id',$id)->where('information.id',$id)->first();

//    dd($result);
    return response()->json($result);

    }

    public function update_info(Request $request,$id)
    {
        $validator = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'gender'=>'required',
            'qualification'=>'required',
            'birthday'=>'required',

            'desc'=>'required',

        ],
            [
                'name.required'=>'User name is required',
                'email.required'=>'Email has to be unique',
                'gender.required'=>'Gender is required',
                'qualification.required'=>'Qualification is required',
                'birthday.required'=>'birth date is required',

            ]
        );
        try{

            DB::beginTransaction();

            $info =  Information::find($id);

            $info->user_name=$request->name;
            $info->email=$request->email;
            $info->gender=$request->gender;
            $info->qualification=$request->qualification;
            $info->birthday=$request->birthday;
            if($request->status){
                $info->status= $request->status;
            }else{
                $info->status= 0;
            }
            $info->description=$request->desc;
            $info->update();


            if ($request->hasFile('image_upload')) {

                $images = $request->file('image_upload');
                foreach ($images as $image) {
                    $file = File::find($id);
                    $imagesName = $image->getClientOriginalName();
                    $ans= $image->move( public_path().'/images/test', $imagesName);
                    $file->images = '/images/test/'.$imagesName;
                    $file->information_id=$info->id;
                    $file->update();
                }

            }


            DB::commit();

            return response()->json([
                'status' => 'success',
                'messages' => "Data updated Successfully"
            ]);


        }
        catch(\Exception $e){
            DB::rollback();
        }
    }

    public function delete_info($id)
    {
        try {
            DB::beginTransaction();
            $info = Information::find($id);
            $info->delete();
            DB::commit();

        }catch(\Exception $e){
            DB::rollback();
        }
        return response()->json([
            'status'=>'success'
        ]);
    }

}


