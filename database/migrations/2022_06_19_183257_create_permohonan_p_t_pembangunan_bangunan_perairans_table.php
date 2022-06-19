<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanPTPembangunanBangunanPerairansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_pt_pbp', function (Blueprint $table) {
            $table->id();

            $table->string('no_permohonan')->nullable()->unique();

            $table->string('perihal')->nullable();
            $table->string('jenis_pekerjaan')->nullable();
            $table->string('lokasi_pekerjaan')->nullable();


            $table->string('dokp_nama_instansi')->nullable();
            $table->string('dokp_tanggal_dokumen')->nullable();
            $table->string('dokp_berlaku_hingga')->nullable();
            $table->date('dokp_berlaku_hingga_tanggal')->nullable();
            $table->string('dokp_file_dokumen')->nullable();


            $table->string('peta_laut')->nullable();
            $table->date('jadwal_kegiatan_dari')->nullable();
            $table->date('jadwal_kegiatan_hingga')->nullable();

            $table->text('peralatan_yang_digunakan')->nullable();
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
        Schema::dropIfExists('permohonan_pt_pbp');
    }
}
