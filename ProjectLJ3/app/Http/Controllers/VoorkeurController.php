<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Voorkeur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class VoorkeurController extends BaseController
{
    
    public function InsertFormulier(Request $request)
    {
       $username = "";
       $email = "";
       // Check login status
       if (Auth::check())
       {
           $username = Auth::user()->name;
           $email = Auth::user()->email;
           $id = Auth::user()->id;
           try {
                $welke_voorkeur = Voorkeur::postVoorkeur($email, $request->optionSelect, $request->postcode);
                return view('homepage', array('username'=>$username, 'email'=>$email));
           } catch (\Throwable $th) {
                return view('voorkeur', array('username'=>$username, 'email' =>$email, 'voorkeur' => $welke_voorkeur));
           }
           
           
           
       }
       else
       {
           return view('homepage');
       }
     
    }
}
