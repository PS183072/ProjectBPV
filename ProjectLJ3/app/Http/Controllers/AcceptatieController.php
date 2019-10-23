<?php 


namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Acceptaties;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class AcceptatieController extends BaseController
{
    public function LoadAcceptaties()
    {
        $lijst = Acceptaties::LaadAcceptaties();
        return(view('acceptaties', array('lijst'=>$lijst)));
    }
}
?>