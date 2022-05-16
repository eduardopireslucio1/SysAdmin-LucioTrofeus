<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models_clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome_razaosocial');
            $table->string('fantasia')->nullable();
            $table->string('email')->nullable();
            $table->string('telefone');
            $table->string('cpf')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('cep');
            $table->string('cidade');
            $table->string('uf');
            $table->string('logradouro');
            $table->string('numero');
            $table->text('observacao')->nullable();
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
        Schema::dropIfExists('models_clientes');
    }
}
