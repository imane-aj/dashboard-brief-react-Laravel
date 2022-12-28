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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('state')->default('onPause');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            // $table->bigInteger('student_brief_id')->unsigned();
            // $table->foreign('student_brief_id')->references('id')->on('student_briefs')->onDelete('cascade');
            $table->bigInteger('preparation_task_id')->unsigned();
            $table->foreign('preparation_task_id')->references('id')->on('preparation_tasks')->onDelete('cascade');
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
        Schema::dropIfExists('tasks');
    }
};
