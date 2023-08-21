<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nom');
            $table->string('prénom');
            $table->date('date_de_naissance');
            $table->string('poste_que_vous_souhaitez');
            $table->text('CV');
            $table->string('ville_de_résidence');
            $table->text('lettre_de_motivation');
            $table->text('commentaires');
            $table->timestamp('postulation-date')->useCurrent();
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
        Schema::dropIfExists('candidates');
    }
}
