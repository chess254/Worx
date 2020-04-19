<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_details', function (Blueprint $table) {
            $table->unsignedInteger('id')->unsigned()->autoIncrement();
            $table->unsignedInteger('seeker_profile_id');
            $table->unsignedInteger('is_current_job')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('job_title')->nullable();
            $table->text('company_name')->nullable(); 
            $table->text('job_location_city')->nullable();
            $table->text('job_location_county')->nullable();
            $table->text('job_location_country')->default('Kenya');
            $table->text('description')->nullable();
            $table->text('website')->nullable();
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
        Schema::dropIfExists('experience_details');
    }
}
