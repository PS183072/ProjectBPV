<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stagelijst extends Model
{

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