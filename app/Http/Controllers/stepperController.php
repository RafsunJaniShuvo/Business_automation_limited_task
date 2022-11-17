<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class stepperController extends Controller
{
    public function create()
    {
        return view('stepper.create');
    }
    public function create_2()
    {
        return view('stepper.create2');
    }
}
