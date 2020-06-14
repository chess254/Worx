<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // Disable all mass assignment restrictions
        // Model::unguard();
    
        // $this->call(UserTypeSeeder::class); 
        // $this->call(CountiesTableSeeder::class);
        // $this->call(JobTypeSeeder::class);
        // $this->call(BusinessStreamSeeder::class);
        // $this->call(JobFunctionSeeder::class);
        // $this->call(UsersSeeder::class);
        // $this->call(CompanySeeder::class);
        // $this->call(LocationSeeder::class);
        // $this->call(JobsSeeder::class);
        // $this->call(SeekerProfileSeeder::class);
        // $this->call(EducationDetailsSeeder::class);
        // $this->call(ExperienceDetailsSeeder::class);
        $this->call(FavouriteSeeder::class);
       
        // Re enable all mass assignment restrictions
        // Model::reguard();
    }
}
