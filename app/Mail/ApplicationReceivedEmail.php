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

//when set to public these props can be accessed by viwe automatically without passing them to the ->with() chain of view
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
        return $this->from('holla@60four.co.ke', 'Mailtrap')
        ->subject('Job application for'.$this->job->title .'received')
        ->view('mails.application-received')->with([
            'job'=>$this->job, //when jon is set as $public we dont have to pass the data here, it can be accessed by view
            // 'user'=> $this->user
            ]);
    }
}
