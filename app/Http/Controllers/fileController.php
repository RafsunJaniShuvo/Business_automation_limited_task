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
      
        return view('file.create',compact('info'));
    }
    public function storeMultiFile(Request $request)
    { 

        $request->validate([
            'images' => 'required',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
                'images.required'=>'Please insert images',
                
            ],
            );

        
       
        if ($request->hasFile('images')) {
            $images = $request->file('images');
    
            foreach ($images as $image) {
                $file = new File();
                $imagesName = $image->getClientOriginalName();
                $ans= $image->move('/images/test', $imagesName);
                $file->images = $ans;
                $file->information_id=$request->info_id;
                $file->save();
                
            }   
         }
         
       
         return response()->json([
            'status'=>'success'
         ]);
        
    }
}
