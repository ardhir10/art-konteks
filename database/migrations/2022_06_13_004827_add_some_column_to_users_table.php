<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nama_perusahaan')->nullable();
            $table->text('alamat_perusahaan')->nullable();
            $table->string('nomor_npwp')->nullable();
            $table->string('file_npwp')->nullable();
            $table->string('file_siup')->nullable();
            $table->string('file_nib')->nullable();
            $table->string('nomor_telepon_perusahaan')->nullable();
            $table->string('alamat_email_perusahaan')->nullable();
            $table->string('nama_pengurus')->nullable();
            $table->string('nomor_telepon_pengurus')->nullable();
            $table->string('logo_perusahaan')->nullable();
            $table->integer('status_approve')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nama_perusahaan')->nullable();
            $table->dropColumn('alamat_perusahaan')->nullable();
            $table->dropColumn('nomor_npwp')->nullable();
            $table->dropColumn('file_npwp')->nullable();
            $table->dropColumn('file_siup')->nullable();
            $table->dropColumn('file_nib')->nullable();
            $table->dropColumn('nomor_telepon_perusahaan')->nullable();
            $table->dropColumn('alamat_email_perusahaan')->nullable();
            $table->dropColumn('nama_pengurus')->nullable();
            $table->dropColumn('nomor_telepon_pengurus')->nullable();
            $table->dropColumn('logo_perusahaan')->nullable();
            $table->dropColumn('status_approve')->nullable();
        });
    }
}
