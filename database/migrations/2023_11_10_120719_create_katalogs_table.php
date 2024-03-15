<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katalog', function (Blueprint $table) {
            $table->bigIncrements('id_katalog');
            $table->string('nama');
            $table->date('pajak_lima_tahunan');
            $table->date('pajak_tahunan');
            $table->string('harga');
            $table->string('dp');
            $table->text('keterangan')->nullable();
            $table->string('foto');
            $table->string('slug');
            $table->unsignedBigInteger('id_tipe');
            $table->unsignedBigInteger('id_merk');
            $table->timestamps();

            $table->foreign('id_tipe')->references('id_tipe')->on('ms_tipe')->onDelete('cascade');
            $table->foreign('id_merk')->references('id_merk')->on('ms_merk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('katalog');
    }
}
