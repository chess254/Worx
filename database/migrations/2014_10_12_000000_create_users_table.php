<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedInteger('id')->unsigned()->autoIncrement();
            $table->string('name', 100);
            $table->string('second_name', 100)->nullable();
            $table->string('middle_name', 100)->nullable();
            $table->string('email',100)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedInteger('role')->default(1);
            $table->unsignedInteger('user_type_id')->default(1);
            $table->date('date_of_birth')->default(today())->nullable();
            $table->char('gender')->default('F')->nullable();
            $table->unsignedInteger('is_active')->default(1);
            $table->unsignedInteger('contact_number')->nullable();
            $table->unsignedInteger('email_notification_active')->default(1)->nullable();
            $table->string('user_image',100)->default("no_image.jpg")->nullable();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
