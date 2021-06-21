<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class recoveryMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject="Recuperacion de contraseña";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $code)
    {
        $this->code=$code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('recuperacion')
            ->with([
                'code'=>$this->code,
            ]);
    }
}
