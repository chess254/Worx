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
            $table->integer('user_id'); 	
            $table->string('first_name', 100);  	
            $table->string('last_name', 100); 	
            $table->integer('current_salary')->nullable(); 	
            $table->unsignedInteger('is_annually_monthly')->default(1); 	
            $table->string('currency', 20)->default('KShs'); 
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
