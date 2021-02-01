<?php

namespace biox2020\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MensajeEnviado extends Mailable
{
    use Queueable, SerializesModels;

    // https://www.youtube.com/watch?v=qArDpWGDDos
    

    public $subject = 'Inscripcion Biox Peru';
    public $credenciales;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($credenciales)
    {
        $this->credenciales = $credenciales;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mensaje-enviado');
    }
}
