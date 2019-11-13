<?php 


namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Enquete;
use App\Voorkeur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class EnqueteController extends BaseController
{
    public function CheckUuid(Request $request)
    {
           $uuid = $request->uuid;
           // Check of de uuid bestaat en haal info op vanaf de uuid anders return 404
           $info = Enquete::getInfoByUuid($uuid);
           $opleiding_sub = Voorkeur::getOpleidingSubs();
           if(count($info) > 0)
           {
               return view('enquete', array('info'=>$info, 'opleiding_sub' => $opleiding_sub));
           }
           else
           {
               abort(404);
           }
     
    }
    public function VerstuurEnquete(Request $request)
    {
            
            try {
                session_start();
                $uuid = $_SESSION["uuid"];
                // Verwijder uuid
                $bedrijfid = Enquete::getInfoByUuid($uuid);
                foreach ($bedrijfid as $bedrijfid)
                {
                    $bedrijfid = $bedrijfid->BedrijfID;
                }
                $InsertData = Enquete::InsertData($request, $uuid, $bedrijfid);
                $VerwijderUuid = Enquete::VerwijderUuid($uuid);
                // Verstuur enquete
                // $VerstuurEnquete = Enquete::InsertEnquete($request);
                session_destroy();
                $info = [""];
                return view('enquete', array('info'=>$info, 'succ69' => 1));
            } catch (\Throwable $th) {
                
            }
     
    }
}