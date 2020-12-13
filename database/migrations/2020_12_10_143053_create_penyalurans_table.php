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
            $table->string('status_tracking_kecamatan');
            $table->string('status_tracking_desa');
            $table->string('keterangan_kemensos');
            $table->string('keterangan_kecamatan');
            $table->string('keterangan_desa');
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
