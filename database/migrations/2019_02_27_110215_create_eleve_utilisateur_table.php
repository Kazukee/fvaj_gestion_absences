<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEleveUtilisateurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleve_utilisateur', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->increments('id')->unique();
            $table->unsignedInteger('eleve_id');
            $table->unsignedInteger('utilisateur_id');
            $table->unsignedInteger('role_id');
            $table->timestamps();

            $table->foreign('eleve_id')->references('id')->on('eleves');
            $table->foreign('utilisateur_id')->references('id')->on('utilisateurs');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eleve_utilisateur');
    }
}
