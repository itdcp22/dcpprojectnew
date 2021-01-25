<?php

namespace App\Mail;


use App\Workpermit;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Wpneedinfo extends Mailable
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
        $sub = $this->workpermit->wp_brand_name . " " . " - Not Approved";
        return $this->from('info@mallofmuscat.com', 'Workpermit Need More Info')
            ->to($this->workpermit->wp_email, $this->workpermit->wp_applicant)
            ->cc('hussain@mallofmuscat.com', 'Hussain')
            ->subject($sub)
            ->view('email.wpneedinfo.wpneedinfo');
    }
}
