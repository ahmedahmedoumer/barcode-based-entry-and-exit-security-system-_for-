<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $users;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($users)
    {
        $this->users = $users;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    //    $random_password=sprintf("%06d", mt_rand(1, 999999));
    //    $subject='Mail from KIOT security system Your verification code is '.$random_password;
        return $this->subject('Mail from KIOT security system')
                     ->from('ahmedinoumer13@gmail.com')
                    ->view('view.verified');
    }
}
