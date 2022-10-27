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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name');
            $table->string('address');
            $table->tinyInteger('id_province');
            $table->tinyInteger('id_city');
            $table->tinyInteger('id_district');
            $table->tinyInteger('id_village');
            $table->tinyInteger('is_swasta');
            $table->string('strata');
            $table->string('phone');
            $table->string('lat');
            $table->string('long');
            $table->string('fax');
            $table->string('nis');
            $table->string('description');
            $table->string('logo');
            $table->string('motto');
            $table->integer('id_headmaster');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('expired_at')->nullable();
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
        Schema::dropIfExists('schools');
    }
};
