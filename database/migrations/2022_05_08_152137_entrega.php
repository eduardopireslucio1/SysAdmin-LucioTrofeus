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
        Schema::create('entrega', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(ModelsFuncionario::class);
            $table->date('dt_entrega');
            $table->decimal('custo',8,2)->nullable();
            $table->string('endereco');
            $table->string('descricao')->nullable();
            $table->string('status');
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
