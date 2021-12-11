<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use \App\Mail\ApplicationReceivedEmail;
use Mail;
use App\Job;
use App\User;
class SendEmailQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    public $Job;
    protected $employer;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user,Job $job)
    {
        $this->user = $user;
        $this->Job = Job::findOrFail($job->id);
        $this->employer = User::findOrFail($job->user_id);

    }

    /**
     * 
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user)
        
        ->send(new ApplicationReceivedEmail($this->Job));
        Mail::to($this->employer)
        
        ->send(new ApplicationReceivedEmail($this->Job));
    }
}
