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
            $voorkeur = DB::table('stageplekken')->join('bedrijven', 'stageplekken.BedrijfID', '=', 'bedrijven.BedrijfID')->where('Geaccepteerd', '=', 1)->orderBy("subtypeid", 'ASC')->get();
            return $voorkeur;
        }
        else if ($voorkeur == 1) {
            $voorkeur = DB::table('stageplekken')->join('bedrijven', 'stageplekken.BedrijfID', '=', 'bedrijven.BedrijfID')->where('Geaccepteerd', '=', 1)->orderBy("subtypeid", 'DESC')->get();
            return $voorkeur;
        }
        else
        {
            $voorkeur = DB::table('stageplekken')->join('bedrijven', 'stageplekken.BedrijfID', '=', 'bedrijven.BedrijfID')->get();
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
            $opleiding_sub = DB::table('subtypes')->select('opleidingen.Naam AS opleidingnaam', 'subtypes.Naam as subtypenaam', 'subtypes.subtypeid AS subtypeid')->join('opleidingen', 'subtypes.opleidingid', '=', 'opleidingen.opleidingid')->get();
            return $opleiding_sub;
      
    }
    static public function postVoorkeur($email, $welke_voorkeur, $postcode)
    {
        $voorkeur = DB::table('users')->where('email', '=', $email)->update(['voorkeur' => $welke_voorkeur, 'postcode' => $postcode]);
        return $welke_voorkeur;
    }
    static public function getsubtypes($vk)
    {
        $subtype = DB::table('subtypes')->where('subtypeid', '=', $vk)->get();
        return $subtype;
    }

}