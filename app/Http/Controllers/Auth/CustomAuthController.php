<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{

    public function index()
    {
        // echo "ok";
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.registration');
    }

    public function dashboard()
    {  // dd(111);
        // if(Auth::check()){
        //     return view('auth.dashboard');
        // }
        // return redirect('login')->withSuccess('Your are not allowed to access dashboard');
        return view('auth.dashboard');
    }

    public function customRegistration(Request $request)
    {
      
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5'
        ]);
        // dd($request->all());
        $data = $request->all();
        // dd($data);
       $check= $this->create($data);
       return redirect('dashboard')->withSuccess('You have signed in');
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
            return redirect('dashboard')->withSuccess('Signed In');
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
