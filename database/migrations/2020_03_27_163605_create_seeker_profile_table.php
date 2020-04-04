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
            $table->string('image',200)->nullable();
            $table->string('title', 500)->nullable();
            $table->json('skills')->nullable();
            $table->text('bio')->nullable(); 	
            $table->string('first_name', 100)->nullable();  	
            $table->string('last_name', 100)->nullable(); 	
            $table->integer('current_salary')->nullable(); 	
            $table->unsignedInteger('is_annually_monthly')->default(1)->nullable(); 	
            $table->string('currency', 20)->default('KShs')->nullable(); 
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
