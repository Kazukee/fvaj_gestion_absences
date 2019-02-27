<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->increments('id')->unique();
            $table->unsignedInteger('eleve_id');
            $table->unsignedInteger('eleve_utilisateur_id');
            $table->date('date_in');
            $table->date('date_out');
            $table->time('time_in')->nullable($value = true);
            $table->time('time_out')->nullable($value = true);
            $table->enum('raison', ['Maladie', 'Absence', 'Stage interne', 'Stage externe', 'Accident', 'Demande de congé', 'Retard']);
            $table->timestamps();

            $table->foreign('eleve_id')->references('id')->on('eleves');
            $table->foreign('eleve_utilisateur_id')->references('id')->on('eleve_utilisateur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absences');
    }
}
