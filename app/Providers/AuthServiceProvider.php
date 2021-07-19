<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

         /* define a employer role */
         Gate::define('isEmployer', function($user) {
            return $user->user_type_id == 2;
         });
        
         /* define a job seeker user role */
         Gate::define('isCandidate', function($user) {
             return $user->user_type_id == 1;
         });

         Gate::define('update_education_details', function ($user, $seeker_profile, $education_details) {
            return ($seeker_profile->id == $education_details->seeker_profile_id);
          });
       
         /* define a user role */
        //  Gate::define('isUser', function($user) {
        //      return $user->role == 'user';
        //  });
    }
}
