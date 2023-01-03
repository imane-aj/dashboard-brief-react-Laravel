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
        Schema::create('brief', function (Blueprint $table) {
            $table->id();
            $table->date('Date_affectation')->nullable();
            $table->unsignedInteger("Preparation_brief_id")->nullable();
            $table->unsignedInteger("Apprenant_id")->nullable();
            $table->foreign('Apprenant_id')->references('id')->on('apprenant')->onDelete('cascade');
            $table->foreign('Preparation_brief_id')->references('id')->on('preparation_brief')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brief');
    }
};
