<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Stagelijst;
use App\Voorkeur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class StagelijstController extends BaseController
{
    public function LoadStagelijst()
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
           $getVoorkeur = Voorkeur::getVoorkeur($email);
           $HeeftAlKeuzesGemaakt = Voorkeur::checkKeuzes($id);
           $voorkeur2 = json_decode($getVoorkeur, true);
           $vk = $voorkeur2[0]["voorkeur"];
          
           $stageplekken = Voorkeur::getStageplekkenVanVoorkeur($vk);
           $aanvragen = Stagelijst::getAanvraagVanStudentId($id);
           if(count($HeeftAlKeuzesGemaakt) > 0)
           {
               return view('stagelijst', array('username'=>$username, 'email' =>$email, 'rol' => $rol, 'vk' => -1, 'aanvragen' => $aanvragen));
           }
           else
           {
               return view('stagelijst', array('username'=>$username, 'email' =>$email, 'rol' => $rol, 'vk' => $vk, 'stageplekken' => $stageplekken));
           }
       }
       else
       {
           return view('homepage');
       }
     
    }
    public function InsertAanvraag(Request $request)
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
                $welke_voorkeur = Stagelijst::postKeuzes($id, $request);
                return view('homepage', array('username'=>$username, 'email'=>$email, 'rol' => $rol));
            } catch (\Throwable $th) {
                return view('homepage', array('username'=>$username, 'email' =>$email, 'rol' => $rol));
            }
           
           
           
       }
       else
       {
           return view('homepage');
       }
     
    }
}
