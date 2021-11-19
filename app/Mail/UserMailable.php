<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMailable extends Mailable
{
    use Queueable, SerializesModels;
    
    public $link;
    public $nombre;
    public $empresa;
    public $tipo;
    public $msj;
    public $logo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link,$name,$empresa,$tipo,$msj,$logo)
    {
        $this->link = $link;
        $this->nombre = $name;
        $this->empresa = $empresa;
        $this->tipo = $tipo;
        $this->msj = $msj;
        $this->logo = $logo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch ($this->tipo){
            case 'clima':
                return $this
                    ->subject('Clima Laboral: Encuesta (Psicología y Emprendimiento)')
                    ->from('example@example.com', $this->empresa)
                    ->view('emails.emailUser');
                break;
            case 'desempenio':
                return $this
                    ->subject('Encuesta sobre el Desempeño Laboral')
                    ->from('example@example.com', $this->empresa)
                    ->view('emails.emailUser');
                break;
            case 'automatizacion':
                return $this
                    ->subject('Evaluación de Competencias Profesionales')
                    ->from('example@example.com', $this->empresa)
                    ->view('emails.emailUser');
                break;
        }
    }
}
