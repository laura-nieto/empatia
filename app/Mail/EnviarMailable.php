<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Clima Laboral: Encuesta (Empatia 360º)';

    public $link;
    public $empresa;
    public $nombre;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link,$nombre,$empresa)
    {
        $this->link = $link;
        $this->empresa = $empresa;
        $this->nombre = $nombre;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.climaLaboral');
    }
}
