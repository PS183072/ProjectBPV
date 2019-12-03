<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailable2 extends Mailable
{
    use Queueable, SerializesModels;
    public $name, $subject, $uuid;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $subject, $uuid)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->uuid = $uuid;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('email.herinnering');
    }
}
