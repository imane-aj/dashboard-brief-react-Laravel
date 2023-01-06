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
        Schema::create('tache', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("preparation_tache_id");
            $table->unsignedInteger("Apprenant_id");
          
            $table->foreign('preparation_tache_id')->references('id')->on('preparation_tache')->onDelete('cascade');
            $table->foreignId('apprenant_P_brief_id')->constrained('brief')->onDelete('cascade');
            $table->foreign('Apprenant_id')->references('id')->on('apprenant')->onDelete('cascade');
            $table->string('Etat')->default('en pouse');

            $table->unsignedInteger('preparation_brief_id');
            $table->foreign('preparation_brief_id')->references('id')->on('preparation_brief')->onDelete('cascade');
           
            $table->timestamp("date_debut")->nullable();
            $table->timestamp("date_fin")->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tache');
    }
};
