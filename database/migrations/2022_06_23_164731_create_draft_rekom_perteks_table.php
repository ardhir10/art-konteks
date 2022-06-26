<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDraftRekomPerteksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draft_rekom_pertek', function (Blueprint $table) {
            $table->id();
            $table->string('no_rekom')->nullable();
            $table->datetime('datetime')->nullable();
            $table->integer('approval_id')->nullable();
            $table->integer('permohonan_id')->nullable();
            $table->string('from_table')->nullable();
            $table->date('hingga_tanggal')->nullable();
            $table->string('range_waktu')->nullable();
            $table->string('durasi')->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('created_by_id')->nullable();
            $table->string('created_by_role')->nullable();
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
        Schema::dropIfExists('draft_rekom_pertek');
    }
}
