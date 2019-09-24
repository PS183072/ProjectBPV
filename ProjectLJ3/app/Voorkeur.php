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
        $voorkeur = DB::table('stageplekken')->where('Type', '=', $voorkeur)->get();
        return $voorkeur;
    }
    static public function postVoorkeur($email, $welke_voorkeur, $postcode)
    {
        $voorkeur = DB::table('users')->where('email', '=', $email)->update(['voorkeur' => $welke_voorkeur, 'postcode' => $postcode]);
        return $welke_voorkeur;
    }

}