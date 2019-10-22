<?php 


namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Enquete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class EnqueteController extends BaseController
{
    public function CheckUuid(Request $request)
    {
           $uuid = $request->uuid;
           // Check of de uuid bestaat en haal info op vanaf de uuid anders return 404
           $info = Enquete::getInfoByUuid($uuid);
           if(count($info) > 0)
           {
               return view('enquete', array('info'=>$info));
           }
           else
           {
               abort(404);
           }
     
    }
    public function VerstuurEnquete(Request $request)
    {
            
            try {
                // Verwijder uuid
                $VerwijderUuid = Enquete::VerwijderUuid($request->uuid);
                // Verstuur enquete
                // $VerstuurEnquete = Enquete::InsertEnquete($request);
                return view('enquete', array('info'=>$info));
            } catch (\Throwable $th) {
                abort(404);
            }
     
    }
}