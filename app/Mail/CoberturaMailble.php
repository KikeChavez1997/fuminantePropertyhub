<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CoberturaMailble extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Cobertura de servicio"; 

    
    public function __construct()
    {
        //
    }

    public function build()
    {
        return $this->view('mails.cobertura');
    }
}
