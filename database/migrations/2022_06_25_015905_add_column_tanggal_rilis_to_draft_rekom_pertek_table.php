<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTanggalRilisToDraftRekomPertekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('draft_rekom_pertek', function (Blueprint $table) {
            $table->date('tanggal_rilis')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('draft_rekom_pertek', function (Blueprint $table) {
            $table->dropColumn('tanggal_rilis')->nullable();
            //
        });
    }
}
