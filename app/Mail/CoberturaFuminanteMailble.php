<?php

namespace App\Mail;

use App\Models\ClientContact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;


class CoberturaFuminanteMailble extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Cobertura de servicio";

    public $datos;
    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    
    public function build()
    {
        $contact = DB::table('client_contacts')->where('user_id', auth()->user()->id)->first();

        return $this->view('mails.coberturaFuminante', compact('contact'));
    }
}
