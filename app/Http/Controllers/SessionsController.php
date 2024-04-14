<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function login(){
        return view('sessions.create');
    }


    public function store(){
        $attributes= request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(!auth()->attempt($attributes)){
        throw ValidationException::withMessages(['email'=>'Your provided credentials could not be verified.']);
        // return back()->withInput()->withErrors(['email'=>'Your provided credentials could not be verified.']);
        }

        session()->regenerate();//session fixation
        return redirect('/')->with('success','Welcome back!');

    }

    public function destroy(){
        Auth::logout();
        return redirect('/')->with('success','Goodbye!');
    }
}
