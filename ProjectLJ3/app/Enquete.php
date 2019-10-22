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
    static public function InsertEnquete($uuid)
    {
        $uuid = DB::table('bedrijven')->where('MailingID', '=', $uuid)->update(['MailingID' => '']);
        return $uuid;
    }
}