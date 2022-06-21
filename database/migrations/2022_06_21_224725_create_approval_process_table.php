<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval_process', function (Blueprint $table) {
            $table->id();

            $table->datetime('timestamp')->nullable();
            $table->integer('permohonan_id')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('tindak_lanjut')->nullable();
            $table->string('type')->nullable();
            $table->string('notify_from_role')->nullable();
            $table->string('notify_to_role')->nullable();
            $table->string('status')->nullable();
            $table->string('visible')->nullable();
            $table->string('from_table')->nullable();

            $table->integer('created_by_id')->nullable();
            $table->integer('updated_by_id')->nullable();

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
        Schema::dropIfExists('approval_process');
    }
}
