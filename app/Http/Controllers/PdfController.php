<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelsCliente;
use App\Models\Pedido;
use App\Models\ModelsProduto;
use Illuminate\Support\Facades\DB;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends Controller
{
    public function geraPdf(Request $request){
        $opcao = $request->opcao;

        $pedido = Pedido::all();

        $clientes = DB::table('models_clientes')
                ->join('pedidos', 'models_clientes.id', '=', 'pedidos.models_cliente_id')
                ->select('models_clientes.id', 'models_clientes.nome_razaosocial', DB::raw('count(*) as qtd_pedidos'))
                ->groupBy('models_clientes.id', 'models_clientes.nome_razaosocial')
                ->orderByDesc('qtd_pedidos')
                ->limit(5)
                ->get();

        $produtosMaisVendidos = ModelsProduto::all();


        switch($opcao){
            case 'maispedidos':
                $pdf = PDF::loadView('relatorios.clientesmaispedidos', compact('clientes'));
                break;
            case 'produtosmaisvendidos':
                $pdf = PDF::loadView('relatorios.produtosmaisvendidos', compact('produtosMaisVendidos'));
                break;
        }

        $pdf->setPaper('A4', 'landscape');
          

        return $pdf->stream();

        
    }
}