<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnLatLongToPenyaluran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penyaluran', function($table) {
            $table->decimal('kec_long', 10, 7);
            $table->decimal('kec_lat', 10, 7);
            $table->decimal('kel_long', 10, 7);
            $table->decimal('kel_lat', 10, 7);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
