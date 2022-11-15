<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Information;
use Illuminate\Http\Request;

class fileController extends Controller
{
    public function create()
    {
        $info = Information::all();
        //dd($info->toArray());
        return view('file.create',compact('info'));
    }
    public function storeMultiFile(Request $request)
    { 
        // print_r($request->toArray());
//         $request->validate([
//             'images' => 'required',
//             'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
//         ],
//         [
//             'images.required'=>'Please insert images',
            
//         ],
// );

        
       
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            // dd($images);
            foreach ($images as $image) {
                $file = new File();
                $imagesName = $image->getClientOriginalName();
                $ans= $image->move(public_path('/images/test'), $imagesName);
                $file->images = $ans;
                $file->information_id=$request->info_id;
                $file->save();
                
            }   
         }
         
        //  dd($file->information_id);
         return response()->json([
            'status'=>'success'
         ]);
        
    }
}
