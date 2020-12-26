<?php

namespace App\Mail;


use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Userapproved extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@omanaquarium.om', 'Workpermit Approved')
            ->to(auth()->user()->email, auth()->user()->name)
            ->subject($this->user->name)
            ->view('email.wpapproved.approved');
    }
}
