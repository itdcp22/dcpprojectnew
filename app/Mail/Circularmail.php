<?php

namespace App\Mail;


use App\User;
use App\Circular;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;

class Circularmail extends Mailable
{
    // use Queueable, SerializesModels;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $circular;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Circular $circular)
    {
        $this->user = $user;
        $this->circular = $circular;
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //   $sub = "Circular - MOM";
        $sub = $this->circular->ci_subject . " " . " - Circular MOM";
        return $this->from('info@mallofmuscat.com', 'Circular')
            ->to($this->user->email)
            ->subject($sub)
            ->view('email.circular.circular');
    }
}
