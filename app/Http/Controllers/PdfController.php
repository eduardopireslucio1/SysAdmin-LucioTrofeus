<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelsCliente;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends Controller
{
    public function geraPdf(){
        $pedido = Pedido::all();

        $clientes = DB::table('models_clientes')
                ->join('pedidos', 'models_clientes.id', '=', 'pedidos.models_cliente_id')
                ->select('models_clientes.id', 'models_clientes.nome_razaosocial', DB::raw('count(*) as qtd_pedidos'))
                ->groupBy('models_clientes.id', 'models_clientes.nome_razaosocial')
                ->orderByDesc('qtd_pedidos')
                ->limit(5)
                ->get();

        $pdf = PDF::loadView('relatorios.clientesmaispedidos', compact('clientes'));

        $pdf->setPaper('A4', 'landscape');
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE);
        $options->set('defaultFont', 'Verdana');
        $options->set('javascript-delay', 3000);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($pdf);
        $dompdf->render('');

        return $dompdf->stream('Clientes_com_mais_pedidos');
    

        // return view('relatorios.clientesmaispedidos');
        
    }
}