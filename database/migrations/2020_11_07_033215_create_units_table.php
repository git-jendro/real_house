<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->integer('building_id');
            $table->string('nama');
            $table->text('deskripsi');
            $table->integer('harga_jual');
            $table->integer('harga_sewa')->nullable();
            $table->integer('harga_cicil')->nullable();
            $table->integer('diskon')->nullable();
            $table->string('vr_link')->nullable();
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
        Schema::dropIfExists('units');
    }
}
