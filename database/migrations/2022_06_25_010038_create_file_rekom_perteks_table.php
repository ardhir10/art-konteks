<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileRekomPerteksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_rekom_pertek', function (Blueprint $table) {
            $table->id();
            $table->datetime('datetime')->nullable();
            $table->integer('draft_rekom_pertek_id')->nullable();
            $table->string('file_name')->nullable();
            $table->string('original_file_name')->nullable();
            $table->integer('approval_id')->nullable();
            $table->integer('permohonan_id')->nullable();
            $table->string('permohonan_type')->nullable();
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
        Schema::dropIfExists('file_rekom_pertek');
    }
}
