<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_missions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lab_id');
            $table->foreign('lab_id')
                ->references('id')
                ->on('labs')
                ->onDelete('cascade');
            $table->integer('queue')->unsigned();
            $table->text('name');
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
        Schema::dropIfExists('lab_missions');
    }
}
