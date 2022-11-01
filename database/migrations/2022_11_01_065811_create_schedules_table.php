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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('id_school');
            $table->integer('id_class');
            $table->integer('id_course')->nullable();
            $table->integer('id_teacher')->nullable();
            $table->string('day')->nullable();
            $table->string('description')->nullable();
            $table->time('time_start');
            $table->time('time_end');
            $table->tinyInteger('status')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('schedules');
    }
};
