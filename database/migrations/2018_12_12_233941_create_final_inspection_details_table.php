<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalInspectionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_inspection_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('final_inspection_record_id')->index();
            $table->unsignedInteger('kataban_inspection_item_id')->index();
            $table->string('text_value')->nullable();
            $table->double('nominal_value', 8, 3)->nullable();
            $table->double('upper_value', 8, 3)->nullable();
            $table->double('lower_value', 8, 3)->nullable();
            $table->unsignedTinyInteger('check_record')->nullable();
            $table->double('measure_record')->nullable();
            $table->timestamps();
            
            $table->foreign('final_inspection_record_id')->references('id')->on('final_inspection_records')->onDelete('cascade');
            $table->foreign('kataban_inspection_item_id')->references('id')->on('kataban_inspection_items')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('final_inspection_details');
    }
}
