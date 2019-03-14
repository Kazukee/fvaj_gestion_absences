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
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->increments('id')->unique()->unsigned();
            $table->unsignedInteger('institution_id')->nullable($value = true);
            $table->unsignedInteger('role_id');
            $table->enum('titre', ['Madame', 'Monsieur']);
            $table->string('name');
            $table->string('prenom');
            $table->string('telephone', 13)->nullable($value = true);
            $table->string('adresse', 255)->nullable($value = true);
            $table->date('date_de_naissance')->nullable($value = true);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('institution_id')->references('id')->on('institutions');
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
        Schema::dropIfExists('users');
    }
}
