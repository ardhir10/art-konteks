<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembangunanPelaksanaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembangunan_pelaksanaan', function (Blueprint $table) {
            $table->id();

            $table->date('tanggal')->nullable();
            $table->string('type_permohonan')->nullable();
            $table->string('type')->nullable();

            $table->integer('approval_process_id')->nullable();
            $table->integer('permohonan_id')->nullable();
            $table->string('from_table')->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('created_by_id')->nullable();

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
        Schema::dropIfExists('pembangunan_pelaksanaan');
    }
}
