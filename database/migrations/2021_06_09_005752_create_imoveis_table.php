<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->string('nome', 100);
            $table->text('descricao')->nullable();

            // Info
            $table->string('obra_entrega')->nullable();
            $table->string('torres')->nullable();
            $table->string('pavimento_terreo')->nullable();
            $table->string('pavimento_tipo')->nullable();
            $table->string('pavimento_cobertura')->nullable();
            $table->string('unidade_pavimento')->nullable();
            $table->string('total_unidade')->nullable();
            $table->string('dormitorios')->nullable();
            $table->string('banheiros')->nullable();
            $table->string('elevadores')->nullable();
            $table->string('area_privativa')->nullable();
            $table->string('area_terreno')->nullable();
            
            // Midia
            $table->string('imagem', 100);
            $table->string('logo', 100)->nullable();
            $table->char('video', 50)->nullable();
            $table->string('tour_virtual', 150)->nullable();

            // Localização  
            $table->char('cep', 15)->nullable();
            $table->string('endereco', 200);
            $table->string('lougradouro', 80);
            $table->char('numero', 10)->nullable();
            $table->string('bairro', 50);
            $table->string('cidade', 60);
            $table->string('estado', 50);
            $table->string('latitude', 50);
            $table->string('longitude', 50);

            $table->boolean('status')->nullable(); 
            $table->boolean('view_home')->nullable();
            $table->string('slug', 100);
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imoveis');
    }
}
