<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendEmailCircular;
use Mail;


class SendEmailCircularJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //working start
        // $email = new SendEmailCircular();
        //Mail::to($this->details['email'])->send($email);
        // working finish

        $mailable = new SendEmailCircular();

        foreach ($this->details['email'] as $email) {
            Mail::to($email)->send($mailable);
        }
    }



    // public function handle()
    //{
    //  $mailable = new SendEmailCircular();

    //foreach ($this->details['email'] as $email) {
    //  Mail::to($email)->send($mailable);
    // }
    // }
}
