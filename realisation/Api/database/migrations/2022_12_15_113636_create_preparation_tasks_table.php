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
        Schema::create('preparation_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc');
            $table->decimal("Duree");
            $table->bigInteger('preparation_brief_id')->unsigned();
            $table->foreign('preparation_brief_id')->references('id')->on('preparation_briefs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preparation_tasks');
    }
};
