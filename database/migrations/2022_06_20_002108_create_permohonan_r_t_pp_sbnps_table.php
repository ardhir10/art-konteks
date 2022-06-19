<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanRTPpSbnpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_rt_ppsbnp', function (Blueprint $table) {
            $table->id();

            $table->string('no_permohonan')->nullable()->unique();

            $table->string('perihal')->nullable();


            $table->string('peta_laut')->nullable();
            $table->date('jadwal_kegiatan_dari')->nullable();
            $table->date('jadwal_kegiatan_hingga')->nullable();

            $table->text('keterangan_tambahan')->nullable();

            $table->string('surat_permohonan')->nullable();

            $table->integer('status')->nullable();
            $table->integer('pemohon_id')->nullable();

            $table->string('type')->nullable();

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
        Schema::dropIfExists('permohonan_rt_ppsbnp');
    }
}
