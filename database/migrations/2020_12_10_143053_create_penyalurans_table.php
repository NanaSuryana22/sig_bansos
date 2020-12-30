<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyaluransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyaluran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bantuan_id')->unsigned();
            $table->integer('kecamatan_id')->unsigned();
            $table->integer('desa_id')->unsigned();
            $table->integer('quota');
            $table->string('status_tracking_kecamatan')->nullable();
            $table->string('status_tracking_desa')->nullable();
            $table->string('keterangan_kemensos')->nullable();
            $table->string('keterangan_kecamatan')->nullable();
            $table->string('keterangan_desa')->nullable();
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
        Schema::dropIfExists('penyaluran');
    }
}
