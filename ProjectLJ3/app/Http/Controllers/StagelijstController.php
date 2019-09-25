<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Stagelijst;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class StagelijstController extends BaseController
{
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

            try {
                $welke_voorkeur = Stagelijst::postKeuzes($id, $request);
                return view('homepage', array('username'=>$username, 'email'=>$email));
            } catch (\Throwable $th) {
                return view('homepage', array('username'=>$username, 'email' =>$email));
            }
           
           
           
       }
       else
       {
           return view('homepage');
       }
     
    }
}
