<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DesempeñoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Encuesta sobre el Desempeño Laboral';

    public $link;
    public $empresa;
    public $evaluador;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link,$empresa,$evaluador)
    {
        $this->link = $link;
        $this->evaluador = $evaluador;
        $this->empresa = $empresa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.desempeñoLaboral');
    }
}
