<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; # UserController.php
use Validator;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function getLogin() # UserController.php
    {
         return view('login');
    }
    public function postLogin(Request $request)
    {
        $request->validate([
        'emailadres' => 'required|email',
        'wachtwoord' => 'required|min:4'
    ]);
    if (Auth::attempt(array('email' => $request->input('emailadres'),
    'password' => $request->input('wachtwoord')), true))
    {
        return redirect('overzicht');
    }
    else
        {
            return view('login');
        }   
        
      
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function postRegistreer(Request $request)
    {
        $request->validate([ # UserController.php
        'naam' => 'required',
        'emailadres' => 'required|email',
        'wachtwoord' => 'required|min:4',
        'activatie' => 'required|digits:8'
        ]);
        if ($request->input('activatie') != '12345678') return redirect('login');
        if (!User::where('email', $request->input('emailadres'))->first()) {
        User::create([
        'name' => $request->input('naam'),
        'email' => $request->input('emailadres'),
        'password' => Hash::make($request->input('wachtwoord')),
        ]);
        }
        return redirect('login');
    }

}