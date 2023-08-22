<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('desired_position')->nullable();
            $table->string('CV')->nullable();
            $table->string('cover_letter')->nullable();
            $table->text('comments')->nullable();
            $table->date('application_date')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // If you ever need to rollback, you can define the rollback operations here.
            // This is optional and depends on your needs.
        });
    }
}

