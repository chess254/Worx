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
            $table->text('email');
            $table->text('name');
            $table->text('description');
            $table->json('services')->nullable();
            $table->unsignedInteger('business_stream_id')->nullable();
            $table->text('website')->nullable();
            $table->text('city')->nullable();
            $table->unsignedInteger('county_id')->nullable();
            $table->text('country')->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('landline', 20)->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linked_in')->nullable();
            $table->string('number_of_employees')->nullable();
            $table->date('date_of_formation')->nullable();
            $table->text('company_logo')->default('no_logo.png')->nullable();
            $table->unsignedInteger('views')->default(0);
            $table->text('address')->nullable();
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
