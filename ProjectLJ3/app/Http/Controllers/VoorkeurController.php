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
           $rol = Auth::user()->rol;
           try {
                $welke_voorkeur = Voorkeur::postVoorkeur($email, $request->optionSelect, $request->postcode);
                $opleiding_sub = Voorkeur::getOpleidingSubs();
                return view('formulier', array('username'=>$username, 'email'=>$email, 'opleiding_sub' => $opleiding_sub));
           } catch (\Throwable $th) {
                return view('formulier', array('username'=>$username, 'email' =>$email, 'voorkeur' => $welke_voorkeur));
           }
           
           
           
       }
       else
       {
           return view('formulier');
       }
     
    }
}
