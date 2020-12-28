<?php

namespace App\Mail;

use App\Account;
use App\Workpermit;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewBill extends Mailable
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
        return $this->from('info@mallofmuscat.com', 'Workpermit Request')
            ->to(auth()->user()->email, auth()->user()->name)
            // ->cc('cheatan@mallofmuscat.com', 'Cheatan')
            //->bcc('hussain@mallofmuscat.com', 'Hussain')
            ->subject($this->workpermit->wp_brand_name)
            ->view('email.newbill.added');
    }
}
