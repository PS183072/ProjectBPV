<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stagelijst extends Model
{
    static public function getAanvraagVanStudentId($StudentID)
    {
        $voorkeur = DB::table('aanvragen')
        ->join('stageplekken', 'stageplekken.StageplekID', '=', 'aanvragen.StageplekID') 
        ->join('bedrijven', 'stageplekken.BedrijfID', '=', 'bedrijven.BedrijfID')->where('aanvragen.StudentID', '=', $StudentID)->get();
        return $voorkeur;
    }
    static public function InsertUuid($uuid, $id)
    {
        $voorkeur = DB::table('bedrijven')->where('BedrijfID', '=', $id)->update(['MailingID' => $uuid]);
        return $voorkeur;
    }
    static public function BedrijvenOphalen()
    {
        
        $voorkeur = DB::table('bedrijven')->get();
        return $voorkeur;
    }
    static public function BedrijfOphalen($id)
    {
        $bedrijf = DB::table('bedrijven')->where('BedrijfID', '=', $id)->get();
        return $bedrijf;
    }
    static public function postKeuzes($StudentID, $request)
    {
        $keuzeloop1 = $request->keus1;
        $keuzeloop2 = $request->keus2;
        try{
            $voorkeur = DB::table('aanvragen')
        ->insert(array(
            array('StageplekID'=> $keuzeloop1  , 'Eerstekeuze' => 1, 'StudentID' => $StudentID ),
            array('StageplekID'=> $keuzeloop2 , 'Eerstekeuze' => 0, 'StudentID' => $StudentID ),
        ));
            }
            catch(\Exception $e){
                // do task when error
                echo $e->getMessage();   // insert query
            } 
        return $voorkeur;
    }
}