<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class fileController extends Controller
{
    public function create()
    {
        return view('file.create');
    }
    public function storeMultiFile(Request $request)
    { 
        // dd($request->all());
       
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            // dd($images);
            foreach ($images as $image) {
                $file = new File();
                $imagesName = $image->getClientOriginalName();
                $ans= $image->move(public_path('/images/test'), $imagesName);
                $file->images = $ans;
                $file->save();
                
            }   
         }
         
         return response()->json([
            'status'=>'success'
         ]);
        
    }
}
