<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->unsignedInteger('id')->unsigned()->autoIncrement();
            $table->unsignedInteger('user_id');
            $table->string('email');
            $table->string('name', 100);
            $table->text('description');
            $table->json('services')->nullable();
            $table->unsignedInteger('business_stream_id')->nullable();
            $table->string('website',200)->nullable();
            $table->text('city', 100)->nullable();
            $table->unsignedInteger('county_id')->nullable();
            $table->text('country', 50)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('landline', 20)->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linked_in')->nullable();
            $table->string('number_of_employees')->nullable();
            $table->date('date_of_formation')->nullable();
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
        Schema::dropIfExists('company');
    }
}
