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
         
    //    $validatedData = $request->validate([
    //     'files' => 'required',
    //     'files.*' => 'mimes:csv,txt,xlx,xls,pdf'
    //     ]);
 
        if($request->TotalFiles > 0)
        {
                
           for ($x = 0; $x < $request->TotalFiles; $x++) 
           {
 
               if ($request->hasFile('files'.$x)) 
                {
                    $file      = $request->file('files'.$x);
 
                    $path = $file->store('public/files');
                    $name = $file->getClientOriginalName();
 
                    $insert[$x]['images'] = $name;
                    // $insert[$x]['path'] = $path;
                }
           }
 
            File::insert($insert);
 
            return response()->json(['success'=>'Ajax Multiple fIle has been uploaded']);
 
          
        }
        else
        {
           return response()->json(["message" => "Please try again."]);
        }
 
    }
}
