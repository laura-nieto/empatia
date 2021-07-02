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
    public $nombre;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link,$nombre)
    {
        $this->link = $link;
        $this->nombre = $nombre;
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
