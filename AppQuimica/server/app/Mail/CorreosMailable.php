<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreosMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Verificación QuimicApp";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $usuario, $recuperarCONT;

    public function __construct($usuario, $recuperarCONT)
    {
        $this->usuario = $usuario;
        $this->recuperarCONT = $recuperarCONT;
        //echo $usuario;
        //exit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->recuperarCONT){
            $data = array('usuario' => $this->usuario);
            return $this->view('emails.correos')->with($data);
        }
        else{
            $data = array('usuario' => $this->usuario);
            return $this->view('emails.correos')->with($data);
        }
        
        //echo $this->hola;exit;
    }
}