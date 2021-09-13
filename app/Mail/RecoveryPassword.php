<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecoveryPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $recoveryCode;

    public function __construct($recoveryCode)
    {
        $this->recoveryCode = $recoveryCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('khanhb1809357@gmail.com', 'GG Esports')
                    ->subject('Password Recovery')
                    ->view('mail.recoveryCode', ['recoveryCode' => $this->recoveryCode]);
    }
}
