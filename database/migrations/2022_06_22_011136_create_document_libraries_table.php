<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_libraries', function (Blueprint $table) {
            $table->id();

            $table->string('original_file_name')->nullable();
            $table->string('file_name')->nullable();
            $table->integer('approval_process_id')->references('id')->on('approval_process')->onDelete('cascade');
            $table->integer('permohonan_id')->nullable();
            $table->integer('created_by_id')->nullable();
            $table->datetime('datetime')->nullable();
            $table->string('type')->nullable();
            $table->string('from_table')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('tindak_lanjut')->nullable();



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
        Schema::dropIfExists('document_libraries');
    }
}
