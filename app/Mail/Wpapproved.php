<?php

namespace App\Mail;


use App\Workpermit;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Wpapproved extends Mailable
{
    use Queueable, SerializesModels;

    public $workpermit;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Workpermit $workpermit)
    {
        $this->workpermit = $workpermit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@mallofmuscat.com', 'Workpermit Approved')
            ->to(auth()->user()->email, auth()->user()->name)
            // ->cc('info@mallofmuscat.com', 'Info')
            // ->cc('security@mallofmuscat.com', 'Security')
            //->bcc('hussain@mallofmuscat.com', 'Hussain')
            ->subject($this->workpermit->wp_brand_name)
            ->view('email.wpapproved.approved');
    }
}
