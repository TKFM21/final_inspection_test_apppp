<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalInspectionRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_inspection_records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kataban_id')->index();
            $table->string('order_no')->index();
            $table->string('lot_no')->index();
            $table->unsignedSmallInteger('qty');
            $table->unsignedInteger('inspector_id')->index();
            $table->unsignedTinyInteger('judge');
            $table->timestamps();
            
            $table->foreign('kataban_id')->references('id')->on('katabans')->onDelete('restrict');
            $table->foreign('inspector_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('final_inspection_records');
    }
}
