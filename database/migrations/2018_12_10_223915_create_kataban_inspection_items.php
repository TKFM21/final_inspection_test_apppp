<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKatabanInspectionItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kataban_inspection_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kataban_id')->index();
            $table->unsignedInteger('kensa_c2_id')->index();
            $table->string('text_value')->nullable();
            $table->double('nominal_value', 8, 3)->nullable();
            $table->double('upper_value', 8, 3)->nullable();
            $table->double('lower_value', 8, 3)->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['kataban_id', 'kensa_c2_id']);
            $table->foreign('kataban_id')->references('id')->on('katabans')->onDelete('cascade');
            $table->foreign('kensa_c2_id')->references('id')->on('kensa_c2s')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kataban_inspection_items');
    }
}
