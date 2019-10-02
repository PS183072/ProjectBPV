<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mailing extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('summabpvtest@gmail.com', 'Mailtrap')
            ->subject('Inschrijven stageplek')
            ->markdown('mails.exmpl')
            ->with([
                'name' => 'Bedrijf',
                'link' => 'localhost:8000/bedrijvenenquete'
            ]);
    }
}
