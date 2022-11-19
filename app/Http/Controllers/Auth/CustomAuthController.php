<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }


    public function dashboard()
    { 
        return view('auth.dashboard');
    }

    public function customRegistration(Request $request)
    {
      
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5'
        ]);
      
        $data = $request->all();
        
       $check= $this->create($data);
       return redirect('/')->withSuccess('You have signed in');
    }

    public function create(array $data)
    {
        // dd($data['name']);
        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),

        ]);
    }


    public function customLogin(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:5',

        ]);
        $credendital = $request->only('email','password');
        // dd($credendital);
        if(AUth::attempt($credendital)){
            return redirect('/')->withSuccess('Signed In');
        }
        return redirect('login')->withSuccess('Login details are not valid');
     
    }

    public function logout()
    {
                Session::flush();
                Auth::logout();
                return redirect()->route('login');

    }
}
