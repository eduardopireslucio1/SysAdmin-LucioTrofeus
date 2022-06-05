<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelsProduto;
use App\Models\ModelsCliente;
use App\Models\Pedido;
use App\Models\ItensPedido;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use DateTime;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class RelatorioController extends Controller
{
    public function index(Request $request)
    {
        return view('relatorios.index');
    }

    public function pedidosPorPeriodo(Request $request){

        $query = Pedido::query();
        $models_clientes = ModelsCliente::all();

        $pedido_data_inicial = $request->get('pedido_data_inicial');
        $pedido_data_final = $request->get('pedido_data_final');

        if($pedido_data_inicial && $pedido_data_final ){
            $query->whereDate('data_entrega', '>=', $pedido_data_inicial);
            $query->whereDate('data_entrega', '<=', $pedido_data_final);
        }

        $pedidos = $query->paginate();
        
        $pdf = PDF::loadView('relatorios.pedidosporperiodo', compact('pedidos','pedido_data_inicial', 'pedido_data_final'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream();

    }

    public function melhoresClientes(Request $request):JsonResponse{
        $clientes = DB::table('models_clientes')
                ->join('pedidos', 'models_clientes.id', '=', 'pedidos.models_cliente_id')
                ->select('models_clientes.id', 'models_clientes.nome_razaosocial', DB::raw('count(*) as qtd_pedidos'))
                ->groupBy('models_clientes.id', 'models_clientes.nome_razaosocial')
                ->orderByDesc('qtd_pedidos')
                ->limit(5)
                ->get();

        return response()->Json($clientes,Response::HTTP_OK);
     }

     public function produtosMaisVendidos(Request $request):JsonResponse{
         $produtos = DB::table('itens_pedidos')
         ->join('models_produtos', 'models_produtos.id','=', 'itens_pedidos.models_produto_id')
         ->select('models_produtos.id', 'models_produtos.nome', DB::raw('sum(itens_pedidos.quantidade) as soma_quantidade'))
         ->groupBy('models_produtos.id', 'models_produtos.nome')
         ->orderByDesc('soma_quantidade')
         ->limit(5)
         ->get();

         return response()->Json($produtos,Response::HTTP_OK);
     }

     public function faturamentoPorPeriodo(Request $request):JsonResponse{
         $faturamento = DB::table('pedidos')
         ->select(DB::raw('sum(valor_total) as total'))
         ->whereBetween('created_at', [$request->query('dataInicial') . ' 00:00:00', $request->query('dataFinal') . ' 23:59:59'])
         ->first();

         return response()->Json($faturamento,Response::HTTP_OK);
     }
}
