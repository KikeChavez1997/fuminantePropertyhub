<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifiMailble extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Pago exitoso";

    public $datos;
    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    
    public function build()
    {
        return $this->view('mails.notify');
    }
}
