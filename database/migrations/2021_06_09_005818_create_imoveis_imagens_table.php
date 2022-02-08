<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImoveisImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis_imagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('imovel_id');
            $table->string('image');
            $table->string('thumbnail');
            
            $table->foreign('imovel_id')->references('id')->on('imoveis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imoveis_imagens');
    }
}
