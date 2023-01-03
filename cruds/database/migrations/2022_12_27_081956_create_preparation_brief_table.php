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
        Schema::create('preparation_brief', function (Blueprint $table) {
            $table->increments('id');
            $table->string("Nom_du_brief")->nullable();
            $table->string("Description")->nullable();
            $table->integer("Duree")->nullable();

            $table->unsignedInteger("Formateur_id")->nullable();
            $table->foreign("Formateur_id")
            ->references("id")
            ->on('formateur')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preparation_brief');
    }
};
