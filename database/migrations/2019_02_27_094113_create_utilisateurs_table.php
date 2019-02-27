<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->increments('id')->unique();
            $table->unsignedInteger('institution_id');
            $table->enum('titre', ['Madame', 'Monsieur']);
            $table->string('nom', 45);
            $table->string('prenom', 45);
            $table->string('telephone', 13)->nullable($value = true);
            $table->string('adresse', 255)->nullable($value = true);
            $table->date('date_de_naissance')->nullable($value = true);
            $table->string('email', 45)->unique();
            $table->timestamps();

            $table->foreign('institution_id')->references('id')->on('institutions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
}
