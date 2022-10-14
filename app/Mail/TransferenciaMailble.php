<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransferenciaMailble extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Pago por transferencia bancaria";
   
    public function __construct()
    {
        //
    }

    
    public function build()
    {
        return $this->view('mails.transferencia');
    }
}
