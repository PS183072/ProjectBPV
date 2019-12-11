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
        if (Auth::check())
        {
            $username = Auth::user()->name;
            $email = Auth::user()->email;
            $id = Auth::user()->id;
            $rol = Auth::user()->rol;
            $lijst = Acceptaties::LaadAcceptaties();
            return(view('acceptaties', array('lijst'=>$lijst, 'username'=>$username, 'email'=>$email, 'rol'=>$rol)));
        }
        else
        {
            abort(404);
        }
    }

    public function StageplekAccepteer(Request $request)
    {
        if (Auth::check())
        {
            $username = Auth::user()->name;
            $email = Auth::user()->email;
            $id = Auth::user()->id;
            $rol = Auth::user()->rol;
        }
        else
        {
            abort(404);
        }
        if (isset($request->btna) && !empty($request->btna))
        {
            $geaccepteerd = Acceptaties::Accepteren($request->btna);
        }
        else if (isset($request->btnw) && !empty($request->btnw))
        {
            $geweigerd = Acceptaties::Weigeren($request->btnw);
        }
        else 
        {
            abort(404);
        }
        $lijst = Acceptaties::LaadAcceptaties();
        return(view('acceptaties', array('lijst'=>$lijst, 'username'=>$username, 'email'=>$email, 'rol'=>$rol)));
    }
}
?>