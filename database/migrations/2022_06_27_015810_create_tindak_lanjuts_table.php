<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTindakLanjutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tindak_lanjut', function (Blueprint $table) {
            $table->id();


            $table->date('tanggal_terbit')->nullable();

            $table->string('type_permohonan')->nullable();

            $table->integer('penerbit_id')->nullable();
            $table->string('penerbit')->nullable();

            $table->string('original_file_name')->nullable();
            $table->string('file_name')->nullable();

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
        Schema::dropIfExists('tindak_lanjut');
    }
}
