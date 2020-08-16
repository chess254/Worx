<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels; 
use App\Company;
use App\Job;

class GroupEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $company;
    public $job;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Company $company, Job $job)
    {
        $this->company = $company;
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        // return $this->view('view.name');
        // dd($company);
        return $this->from( $this->company->email, 'Mailtrap')
        ->subject('youve been shortlisted  for'.$this->job->title )
        ->view('mails.shortlisted')->with([
            'job'=>$this->job, //when jon is set as $public we dont have to pass the data here, it can be accessed by view
            // 'user'=> $this->user
            ]);
    }
}
