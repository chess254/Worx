<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TweakJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->unsignedInteger('id')->unsigned()->autoIncrement();
            $table->text('title');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('business_stream_id');
            $table->unsignedInteger('job_function_id');
            $table->unsignedInteger('county_id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('company_name_hidden')->default(0);
            $table->integer('no_of_positions')->default('1');
            $table->date('created_date')->default(today());
            $table->longText('description', 1000);
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('is_active')->default(1);
            $table->string('salary_range', 30)->nullable();
            $table->date('deadline')->default(today());
            $table->longText('responsibilities', 1000);
            $table->longText('requirements', 1000);
            $table->longText('education',1000);
            $table->integer('applicationMethod');
            $table->text('applicationEmail')->nullable();
            $table->text('applicationWebsite')->nullable();
            $table->text('applicationWorx')->nullable();
            $table->longText('applicationInstructions')->nullable();
            $table->integer('termsAndConditions')->nullable();    
            // $table->integer('views')->default(0)->nullable();
            $table->text('image')->default('no_image.jpg');
            $table->unsignedInteger('views')->default(0);
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
        Schema::dropIfExists('jobs');
    }
}
