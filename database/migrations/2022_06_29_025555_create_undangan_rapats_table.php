<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndanganRapatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undangan_rapat', function (Blueprint $table) {
            $table->id();

            $table->date('tanggal_rapat')->nullable();
            $table->string('perihal_rapat')->nullable();
            $table->string('jam_rapat')->nullable();
            $table->string('durasi_rapat')->nullable();

            $table->string('type')->nullable();

            $table->string('original_file_name')->nullable();
            $table->string('file_name')->nullable();


            // --- WAJIB
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
        Schema::dropIfExists('undangan_rapat');
    }
}
