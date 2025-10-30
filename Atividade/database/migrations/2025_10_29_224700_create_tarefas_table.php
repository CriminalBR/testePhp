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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->boolean('concluida')->default(false);

            //isso aq é uma chave estrangeira usada para referenciar a tabela categorias!
            $table->unsignedBigInteger('categoria_id');

            $table->foreign('categoria_id') //cria a chave que tem que corresponder a um valor existente na tabela categorias
            ->references('id') // vai se referir ao id da coluna na Caegoria
            ->on('categorias') // indica qual tabela contem a culuna referenciada
            ->onDelete('cascade'); // deleta tarefas se a categoria for apagada

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
        Schema::dropIfExists('tarefas');
    }
};
