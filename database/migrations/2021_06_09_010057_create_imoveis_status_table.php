<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImoveisStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis_status', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('imovel_id');
            $table->unsignedBigInteger('status_id');
            $table->char('porcentagem', 5);

            $table->foreign('imovel_id')->references('id')->on('imoveis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imoveis_status');
    }
}
