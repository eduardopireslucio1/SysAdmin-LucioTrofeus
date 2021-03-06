<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ModelsFuncionario;

class Entrega extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(ModelsFuncionario::class);
            $table->date('dt_entrega');
            $table->decimal('taxa_frete',8,2)->nullable();
            $table->string('descricao')->nullable();
            $table->string('status');
            $table->string('cep')->nullable();
            $table->string('cidade');
            $table->string('estado')->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('tipo_frete')->nullable();
            $table->string('cod_rastreio')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrega');
    }
}
