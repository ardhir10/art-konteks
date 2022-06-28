<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanRapatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_rapat', function (Blueprint $table) {
            $table->id();


            $table->string('ringkasan_rapat')->nullable();

            $table->string('original_file_name')->nullable();
            $table->string('file_name')->nullable();
            $table->string('type')->nullable();


            // --- WAJIB
            $table->integer('undangan_rapat_id')->nullable();
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
        Schema::dropIfExists('laporan_rapat');
    }
}
