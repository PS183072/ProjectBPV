<?php
namespace App\Http\Controllers;

use PHPMailer\PHPMailer;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Support\Str;

use App\Stagelijst;
class MailController extends Controller
{

    public function mail()
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
                Mail::to($b->BedrijfEmail)->send(   new SendMailable($name, $subject, $uid));
            }
        }

        
        // $name = 'jesus christ is my nigga';
        // $subject = 'OH MIJN FUCKING GOD. KUTSPEL!';
        // Mail::to('PS183072@summacollege.nl')->send(new SendMailable($name, $subject));
    
        return 'Email was sent';
    }
}