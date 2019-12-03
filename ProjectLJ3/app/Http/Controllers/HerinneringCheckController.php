<?php
namespace App\Http\Controllers;

use PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Stagelijst;
use App\Mailcontroller;
use Illuminate\Http\Request;

class HerinneringsCheckController extends Controller
{
    public function CheckWhichKindOfMail(Request $request)
    {
        if (isset($request->mail)) {
            Mailcontroller::singleMail($request);
        } else if(isset($request->mail2)){
            Mailcontroller::singleHerinningsMail($request);
        }
    }
}