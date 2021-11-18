<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lab_mission_id');
            $table->foreign('lab_mission_id')
                ->references('id')
                ->on('lab_missions')
                ->onDelete('cascade');
            $table->integer('queue')->unsigned();
            $table->text('name');
            $table->text('img');
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
        Schema::dropIfExists('mission_steps');
    }
}
