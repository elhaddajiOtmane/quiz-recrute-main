<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('date_of_birth');
            $table->string('desired_position');
            $table->string('CV');
            $table->string('cover_letter');
            $table->string('comments');
            $table->string('application_date');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->char('role')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
