<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvSuperficieMailble extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Superficie de servicio"; 
   
    public function __construct()
    {
        //
    }

   
    public function build()
    {
        return $this->view('invmails.invSuperficie');
    }
}
