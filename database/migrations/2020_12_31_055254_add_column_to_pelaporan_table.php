<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToPelaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelaporan', function (Blueprint $table) {
            $table->string('phone_number');
            $table->renameColumn('status', 'status_desa');
            $table->string('status_kecamatan')->nullable();
            $table->string('status_kemensos')->nullable();
            $table->renameColumn('keterangan', 'keterangan_desa');
            $table->string('keterangan_kecamatan')->nullable();
            $table->string('keterangan_kemensos')->nullable();
        });
    }
}
