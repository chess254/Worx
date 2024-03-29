<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekerProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seeker_profile', function (Blueprint $table) {
            $table->unsignedInteger('id')->unsigned()->autoIncrement();
            $table->unsignedInteger('user_id');
            $table->text('image')->nullable();
            $table->text('title')->nullable();
            $table->json('skills')->nullable();
            $table->longText('bio')->nullable(); 	
            $table->text('first_name', 100)->nullable();  	
            $table->text('last_name', 100)->nullable(); 
            $table->string('highest_qualification', 100)->default('Other');	
            $table->integer('current_salary')->nullable(); 	
            $table->unsignedInteger('is_annually_monthly')->default(1)->nullable(); 	
            $table->string('currency', 20)->default('KShs')->nullable(); 
            $table->unsignedInteger('views')->default('0');

            $table->unsignedInteger('career_level')->default(1)->nullable();
            // $table->json('favourite_jobs')->nullable();
            $table->json('languages')->nullable();
            $table->json('interests')->nullable();
            $table->string('marital_status',20)->default('undisclosed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seeker_profile');
    }
}
