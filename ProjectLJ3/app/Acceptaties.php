<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Acceptaties extends Model
{
    static public function LaadAcceptaties() 
    {
        $lijst = DB::table('stageplekken')->where([['Aanvraag', '=', 1],['Geaccepteerd', '=', 0]])->get();
        return $lijst;
    }
    static public function Accepteren($id)
    {
        $geaccepteerd = DB::table('stageplekken')->where('StageplekID', '=', $id)->update(['Geaccepteerd' => 1, 'Aanvraag' => 0]);
        return $geaccepteerd;
    }
    static public function Weigeren($id)
    {
        $geweigerd = DB::table('stageplekken')->where('StageplekID', '=', $id)->update(['Geaccepteerd' => 0, 'Aanvraag' => 0]);
        return $geweigerd;
    }
}
?>