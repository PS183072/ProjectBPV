<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Voorkeur extends Model
{

    static public function getVoorkeur($email)
    {
        $voorkeur = DB::table('users')->where('email', '=', $email)->get();
        return $voorkeur;
    }
    static public function getStageplekkenVanVoorkeur($voorkeur)
    {
        if ($voorkeur == 0) {
            $voorkeur = DB::table('stageplekken')->where('Geaccepteerd', '=', 1)->orderBy("type", 'ASC')->get();
            return $voorkeur;
        }
        else if ($voorkeur == 1) {
            $voorkeur = DB::table('stageplekken')->where('Geaccepteerd', '=', 1)->orderBy("type", 'DESC')->get();
            return $voorkeur;
        }
    }
    static public function checkKeuzes($StudentID)
    {
            $heeftalkeuzesgemaakt = DB::table('aanvragen')->where("StudentID", '=', $StudentID)->get();
            return $heeftalkeuzesgemaakt;
      
    }
    static public function getOpleidingSubs()
    {
            $opleiding_sub = DB::table('subtypes')->get();
            return $opleiding_sub;
      
    }
    static public function postVoorkeur($email, $welke_voorkeur, $postcode)
    {
        $voorkeur = DB::table('users')->where('email', '=', $email)->update(['voorkeur' => $welke_voorkeur, 'postcode' => $postcode]);
        return $welke_voorkeur;
    }

}