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
    
        $this->call(UserTypeSeeder::class); 
        $this->call(CountiesTableSeeder::class);
        $this->call(JobTypeSeeder::class);
        $this->call(BusinessStreamSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(JobsSeeder::class);
       
        // Re enable all mass assignment restrictions
        // Model::reguard();
    }
}
