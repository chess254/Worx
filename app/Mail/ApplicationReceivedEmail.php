<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Job;

class ApplicationReceivedEmail extends Mailable
{
    use Queueable, SerializesModels;


    protected $job;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
         Job $job
        // $user
        )
    {
        $this->job = $job;
        // $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->from('holla@60four.co.ke', 'Mailtrap')
        ->subject('Job application received')
        ->view('mails.email')->with([
            'job'=>$this->job, 
            // 'user'=> $this->user
            ]);
    }
}
