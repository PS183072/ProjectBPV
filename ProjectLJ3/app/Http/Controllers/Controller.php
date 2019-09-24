<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Auth;
class Controller extends BaseController
{
    public function LoadHomepage()
    {
       $username = "";
       $email = "";
       // Check login status
       if (Auth::check())
       {
           $username = Auth::user()->name;
           $email = Auth::user()->email;
       }

       return view('homepage', array('username'=>$username, 'email' =>$email));
       
    }
    public function LoadStagelijst()
    {
       $username = "";
       $email = "";
       // Check login status
       if (Auth::check())
       {
           $username = Auth::user()->name;
           $email = Auth::user()->email;
       }

       return view('stagelijst', array('username'=>$username, 'email' =>$email));
       
    }
    public function LoadFormulier()
    {
       $username = "";
       $email = "";
       // Check login status
       if (Auth::check())
       {
           $username = Auth::user()->name;
           $email = Auth::user()->email;
       }

       return view('formulier', array('username'=>$username, 'email' =>$email));
       
    }
    public function LoadBedrijfLogin()
    {
       

       return view('bedrijven');
       
    }
    
}
