<?php
namespace App\Http\Controllers;

use PHPMailer\PHPMailer;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Stagelijst;
use Illuminate\Http\Request;

class MailController extends Controller
{

    public function mail()
    {   
        
       $username = "";
       $email = "";
       // Check login status
       if (Auth::check())
       {
           $username = Auth::user()->name;
           $email = Auth::user()->email;
           $rol = Auth::user()->rol;
           $uuid = Str::uuid()->toString();
           if($rol == 1)
           {
        $bedrijven = Stagelijst::BedrijvenOphalen();
       
        foreach ($bedrijven as $b)
        {
            // Database functie: Insert uuid
            $uuid = (string) Str::uuid();
            $InsertUUID = Stagelijst::InsertUuid($uuid, $b->BedrijfID);
        }
        // Database functie: Haal bedrijven op
        
        $bedrijven = Stagelijst::BedrijvenOphalen();
        
        foreach ($bedrijven as $b)
        {
            $name = $b->BedrijfNaam;
            $subject = 'Summa Stageplek Enquete';
            $uid = $b->MailingID;
            if(filter_var($b->BedrijfEmail, FILTER_VALIDATE_EMAIL)) 
            {
                Mail::to($b->BedrijfEmail)->send(new SendMailable($name, $subject, $uid));
            }
        }
    
        return view('mailbedrijven', array('username' => $username, 'email' =>$email, 'rol' => $rol, 'message' => 'Mails verzonden', 'bedrijven' => $bedrijven));
    }
    else {
        abort(404);
    }
    }
    else 
    {
        abort(404);
    }
    }

    public function singleMail(Request $request)
    {
        $username = "";
       $email = "";
       // Check login status
        if (Auth::check())
        {
            $username = Auth::user()->name;
            $email = Auth::user()->email;
            $rol = Auth::user()->rol;
            $uuid = Str::uuid()->toString();
            if($rol == 1)
            {
                $uuid = (string) Str::uuid();
                $InsertUUID = Stagelijst::InsertUuid($uuid, $request->mail);
                $name;
                $bedrijf = Stagelijst::BedrijfOphalen($request->mail);
                foreach ($bedrijf as $b)
                {
                    $name = $b->BedrijfNaam;
                }
                $subject = 'Summa Stageplek Enquete';
                if(filter_var($b->BedrijfEmail, FILTER_VALIDATE_EMAIL)) 
                {
                    Mail::to($b->BedrijfEmail)->send(new SendMailable($name, $subject, $uuid));
                    $bedrijven = Stagelijst::BedrijvenOphalen();
                    return view('mailbedrijven', array('username' => $username, 'email' =>$email, 'rol' => $rol, 'message' => 'Mail verzonden', 'bedrijven' => $bedrijven));
                }
            }
            else 
            {
                abort(404);
            }
        }
        else 
        {
            abort(404);
        }
    }
}