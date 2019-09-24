<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stagelijst extends Model
{

    static public function postStagelijst($email, $welke_voorkeur, $postcode)
    {
        $voorkeur = DB::table('users')->where('email', '=', $email)->insert(['voorkeur' => $welke_voorkeur, 'postcode' => $postcode]);
        return $welke_voorkeur;
    }

}