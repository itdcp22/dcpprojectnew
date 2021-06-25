<?php

namespace App\Mail;


use App\User;
//use App\Circular;
use App\Utility;
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
    public $utility;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Utility $utility)
    {
        $this->user = $user;
        $this->utility = $utility;
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //   $sub = "Circular - MOM";
        $sub = $this->utility->ci_subject . " " . " - Utilities bill updated";
        return $this->from('info@mallofmuscat.com', 'Utility Bills')
            ->to($this->user->email)
            ->subject($sub)
            ->view('email.utility.utilityemail');
    }
}
