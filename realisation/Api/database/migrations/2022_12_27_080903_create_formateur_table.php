<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formateur', function (Blueprint $table) {
            $table->increments('id');
            $table->string("Nom_formateur")->nullable();
            $table->string("Prenom_formateur")->nullable();
            $table->string("Email_formateur")->nullable();
            $table->string("Phone")->nullable();
            $table->string("Adress")->nullable();
            $table->string("CIN")->nullable();
            $table->string("Image")->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formateur');
    }
};
