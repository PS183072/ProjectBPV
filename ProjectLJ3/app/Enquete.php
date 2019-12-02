<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Enquete extends Model
{
    static public function getInfoByUuid($uuid)
    {
        $uuid = DB::table('bedrijven')->where('MailingID', '=', $uuid)->get();
        return $uuid;
    }
    static public function VerwijderUuid($uuid)
    {
        $uuid = DB::table('bedrijven')->where('MailingID', '=', $uuid)->update(['MailingID' => '']);
        return $uuid;
    }
    static public function InsertData($bedrijfid, $asp, $beschr, $opts) 
    {
        $stageplekken = DB::table('stageplekken')->insert(['BedrijfID' => $bedrijfid, 'StageplekOmschrijving' => $beschr, 'subtypeID' => $opts, 'Aanvraag' => 1, 'Geaccepteerd' => 0, 'Aantal' => $asp]);
        return $stageplekken;
    }
}