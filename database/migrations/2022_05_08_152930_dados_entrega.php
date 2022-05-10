<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pedido;
use App\Models\Entrega;

class DadosEntrega extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_entregas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Pedido::class);
            $table->foreignIdFor(Entrega::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dados_entrega');
    }
}
