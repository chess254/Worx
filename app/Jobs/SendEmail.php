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
class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    public $Job;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user,Job $job)
    {
        $this->user = $user;
        $this->Job = Job::findOrFail($job->id);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $email = new ApplicationReceivedEmail();
        Mail::to($this->user)->send(new ApplicationReceivedEmail($this->Job));
    }
}
