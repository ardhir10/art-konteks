<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_survey', function (Blueprint $table) {
            $table->id();

            $table->date('tanggal_survey_dari');
            $table->date('tanggal_survey_sampai');

            $table->integer('approval_process_id');
            $table->integer('permohonan_id');
            $table->string('from_table');
            $table->text('keterangan');
            $table->integer('created_by_id');

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
        Schema::dropIfExists('laporan_survey');
    }
}
