<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AutomatizacionMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Automatización de pruebas';

    public $link;
    public $nombre;
    public $puesto;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link,$name,$puesto)
    {
        $this->link = $link;
        $this->nombre = $name;
        $this->puesto = $puesto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.automatizacionPruebas');
    }
}
