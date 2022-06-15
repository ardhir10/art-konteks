<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitikKordinatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titik_kordinat', function (Blueprint $table) {
            $table->id();
            $table->integer('permohonan_id')->nullable();
            $table->string('type')->nullable();
            $table->string('table')->nullable();

            $table->string('long_degrees')->nullable();
            $table->string('long_minutes')->nullable();
            $table->string('long_second')->nullable();
            $table->string('long_direction')->nullable();

            $table->string('lat_degrees')->nullable();
            $table->string('lat_minutes')->nullable();
            $table->string('lat_second')->nullable();
            $table->string('lat_direction')->nullable();

            $table->string('long_dec')->nullable();
            $table->string('lat_dec')->nullable();

            $table->integer('order')->nullable();
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
        Schema::dropIfExists('titik_kordinat');
    }
}
