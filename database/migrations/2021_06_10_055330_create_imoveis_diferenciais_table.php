<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImoveisDiferenciaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis_diferenciais', function (Blueprint $table) {
            $table->unsignedBigInteger('imovel_id');
            $table->unsignedBigInteger('diferencial_id');

            $table->foreign('imovel_id')->references('id')->on('imoveis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('diferencial_id')->references('id')->on('diferenciais')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imoveis_diferenciais');
    }
}
