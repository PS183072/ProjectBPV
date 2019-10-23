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
}
?>