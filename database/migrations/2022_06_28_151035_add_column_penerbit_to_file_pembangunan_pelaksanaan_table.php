<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPenerbitToFilePembangunanPelaksanaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file_pembangunan_pelaksanaan', function (Blueprint $table) {
            $table->string('penerbit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('file_pembangunan_pelaksanaan', function (Blueprint $table) {
            $table->dropColumn('penerbit')->nullable();

        });
    }
}
