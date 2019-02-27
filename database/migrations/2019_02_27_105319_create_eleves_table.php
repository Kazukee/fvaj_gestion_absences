<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->increments('id')->unique();
            $table->unsignedInteger('classe_id');
            $table->enum('titre', ['Madame', 'Monsieur']);
            $table->string('nom', 45);
            $table->string('prenom', 45);
            $table->string('telephone', 13);
            $table->string('adresse', 255);
            $table->string('email_interne', 45);
            $table->string('email_externe', 45)->nullable($value = true);
            $table->timestamps();

            $table->foreign('classe_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eleves');
    }
}
