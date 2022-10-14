<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PassMailble extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Bienvenido a Fuminante, datos de acceso"; 

    public function __construct()
    {
        //
    }

    public function build()
    {
        return $this->view('mails.pass');
    }
}
