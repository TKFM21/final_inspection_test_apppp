<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKatabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katabans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kataban')->unique();
            $table->unsignedSmallInteger('rated_voltage');
            $table->unsignedInteger('fan_kbn1_id')->index();
            $table->string('revision');
            $table->unsignedInteger('status_id')->index();
            $table->timestamp('application_at')->nullable();
            $table->unsignedInteger('application_user_id')->nullable()->index();
            $table->timestamp('confirmed_at')->nullable();
            $table->unsignedInteger('confirmed_user_id')->nullable()->index();
            $table->timestamp('approval_at')->nullable();
            $table->unsignedInteger('approval_user_id')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('fan_kbn1_id')->references('id')->on('fan_kbn1s')->onDelete('restrict');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict');
            $table->foreign('application_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('confirmed_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('approval_user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('katabans');
    }
}
