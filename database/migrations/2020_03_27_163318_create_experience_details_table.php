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
            // $table->unsignedInteger('id')->unsigned()->autoIncrement();
            $table->unsignedInteger('user_id')->primary();
            $table->unsignedInteger('is_current_job')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('job_title', 100);
            $table->string('company_name', 100); 
            $table->string('job_location_city', 100);
            $table->string('job_location_county', 50);
            $table->string('job_location_country', 50)->default('Kenya');
            $table->string('description', 500);
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
