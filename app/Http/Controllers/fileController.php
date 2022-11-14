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
         
        if ($request->hasFile('images')) {
            $images = $request->file('images');
          

            // $images = $request->images;
            foreach ($images as $image) {
            //     $imagesName = $images->getClientOriginalName();
                    $imagesName = $image->getClientOriginalName();
            //     dd($imagesName);    
                $randonName = rand(1, 200);
                $image->move(public_path('/images/test'),$randonName . $imagesName . $randonName . '.jpg');

            }
         }
        
    }
}
