<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nome');
            $table->string('fabricante');
            $table->string('modelo');
            $table->string('cor');
            $table->string('sku');
            $table->decimal('valor');
            $table->text('descricao');
            $table->string('imagem');
            $table->dateTime('data_fabricacao');
            $table->dateTime('data_vencimento');
            $table->integer('quantidade');

            $table->boolean('disponivel');
            $table->foreignId('categoria_id')->references('id')->on('categorias');
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
