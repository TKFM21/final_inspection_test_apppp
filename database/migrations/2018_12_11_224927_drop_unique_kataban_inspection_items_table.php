<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropUniqueKatabanInspectionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kataban_inspection_items', function (Blueprint $table) {
            $table->dropUnique(['kataban_id', 'kensa_c2_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kataban_inspection_items', function (Blueprint $table) {
            //
        });
    }
}
