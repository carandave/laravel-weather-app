<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function home() {
        return view('admin.index');
    }


    public function register() {
        return view('register');
    }

    public function registerInsert(Request $request){
        $validatedData = $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=> 'required' 
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $data = User::create($validatedData);

        return redirect('/register')->with('success','Registration Successful! Please Login Now.');

        
    }

    public function login() {
        return view('login');
    }


    public function loginInsert(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            return redirect('/home')->with('success','Registration Successful! Please Login Now.');
        }
        else{
            return back()->with('error','Invalid Email or Password!');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
