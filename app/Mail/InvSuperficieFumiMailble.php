<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvSuperficieFumiMailble extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Superficie de un servicio para negocio"; 

    public $datos;

    public function __construct($datos)
    {
      $this->datos;
    }

    public function build()
    {
        return $this->view('invmails.invSuperficieFumi');
    }
}
