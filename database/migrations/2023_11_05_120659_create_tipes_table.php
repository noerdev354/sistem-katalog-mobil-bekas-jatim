<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_tipe', function (Blueprint $table) {
            $table->bigIncrements('id_tipe');
            $table->string('nama_tipe');
            $table->unsignedBigInteger('id_merk');
            $table->timestamps();

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
        Schema::dropIfExists('ms_tipe');
    }
}
