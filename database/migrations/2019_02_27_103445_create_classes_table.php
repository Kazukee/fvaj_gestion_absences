<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->increments('id')->unique();
            $table->unsignedInteger('volee_id');
            $table->unsignedInteger('fk_luam')->nullable($value = true);
            $table->unsignedInteger('fk_lupm')->nullable($value = true);
            $table->unsignedInteger('fk_maam')->nullable($value = true);
            $table->unsignedInteger('fk_mapm')->nullable($value = true);
            $table->unsignedInteger('fk_meam')->nullable($value = true);
            $table->unsignedInteger('fk_mepm')->nullable($value = true);
            $table->unsignedInteger('fk_jeam')->nullable($value = true);
            $table->unsignedInteger('fk_jepm')->nullable($value = true);
            $table->unsignedInteger('fk_veam')->nullable($value = true);
            $table->unsignedInteger('fk_vepm')->nullable($value = true);
            $table->string('code', 4)->unique();
            $table->timestamps();

            $table->foreign('volee_id')->references('id')->on('volees');
            $table->foreign('fk_luam')->references('id')->on('matieres');
            $table->foreign('fk_lupm')->references('id')->on('matieres');
            $table->foreign('fk_maam')->references('id')->on('matieres');
            $table->foreign('fk_mapm')->references('id')->on('matieres');
            $table->foreign('fk_meam')->references('id')->on('matieres');
            $table->foreign('fk_mepm')->references('id')->on('matieres');
            $table->foreign('fk_jeam')->references('id')->on('matieres');
            $table->foreign('fk_jepm')->references('id')->on('matieres');
            $table->foreign('fk_veam')->references('id')->on('matieres');
            $table->foreign('fk_vepm')->references('id')->on('matieres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
