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
    static public function InsertData($request, $uuid, $bedrijfid) 
    {
        $stageplekken = DB::table('stageplekken')->insert(['BedrijfID' => $bedrijfid, 'StageplekOmschrijving' => $request->beschrijving, 'Type' => $request->optionSelect, 'Aanvraag' => 1, 'Geaccepteerd' => 0, 'Aantal' => $request->AantalStageplekken]);
        return $stageplekken;
    }
}