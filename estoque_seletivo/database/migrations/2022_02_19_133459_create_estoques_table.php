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
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('produto_quantidade_anterior');
            $table->integer('status');

            $table->foreignId('produto_id')->references('id')->on('produtos');
            $table->integer('produto_quantidade')->references('quantidade')->on('produtos');    
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
        Schema::dropIfExists('estoques');
    }
};
