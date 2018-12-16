<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKensaC2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kensa_c2s', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kensa_c1_id');
            $table->string('kensa_c2');
            $table->unsignedSmallInteger('display_no');
            $table->timestamps();
            
            $table->unique(['kensa_c1_id', 'kensa_c2']);
            $table->foreign('kensa_c1_id')->references('id')->on('kensa_c1s')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kensa_c2s');
    }
}
