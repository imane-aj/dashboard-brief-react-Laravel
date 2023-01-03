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
        Schema::create('groupes_preparation_brief', function (Blueprint $table) {
            $table->increments('id');
            
            $table->foreignId("Apprenant_preparation_brief_id")
            ->constrained('brief')
            ->onDelete('cascade');

            $table->unsignedInteger("Groupe_id")->nullable();
            $table->foreign("Groupe_id")
            ->references("id")
            ->on('groupes')
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
        Schema::dropIfExists('groupes_preparation_brief');
    }
};
