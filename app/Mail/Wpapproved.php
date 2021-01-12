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
            ->to($this->workpermit->wp_email, $this->workpermit->wp_applicant)
            ->cc('info@mallofmuscat.com', 'Info')
            ->cc('cheatan@mallofmuscat.com', 'Cheatan')
            ->cc('hussain@mallofmuscat.com', 'Hussain')
            ->cc('security@mallofmuscat.com', 'Security')
            ->cc('cr.mallofmusct@gmail.com', 'Control')
            ->cc('sec.superviser.mallofmuscat@gmail.com', 'Supervisor')
            ->bcc('itmom20@gmail.com', 'IT')
            ->subject($this->workpermit->wp_brand_name)
            ->view('email.wpapproved.approved');
    }
}
