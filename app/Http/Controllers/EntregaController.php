<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\ModelsFuncionario;
use App\Models\ModelsCliente;
use App\Models\Entrega;
use App\Models\DadosEntrega;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EntregaStoreRequest;

class EntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models_funcionarios = ModelsFuncionario::all();

        $pedidoEntrega = EntregaController::getPedidosInEntrega();
        $pedidosInEntrega = json_decode( json_encode($pedidoEntrega), true);

        $pedidos = DB::table('pedidos')
        ->join('models_clientes', 'models_clientes.id', '=', 'pedidos.models_cliente_id')
        ->select('pedidos.id', 'pedidos.models_cliente_id', 'models_clientes.nome_razaosocial', 'pedidos.status')
        ->whereNotIn('pedidos.id', $pedidosInEntrega)
        ->get();

        return view('entrega.create', compact('models_funcionarios', 'pedidos'));
    }

    public static function getPedidosInEntrega()
    {
        $pedidoInEntrega = DB::table('pedidos')
        ->join('dados_entregas', 'dados_entregas.pedido_id', '=', 'pedidos.id')
        ->select('pedidos.id')
        ->get();
        
        return $pedidoInEntrega;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntregaStoreRequest $request)
    {
        $dados = $request->all();

        $entrega = Entrega::create([
            'models_funcionario_id'=>$dados['models_funcionario_id'], 
            'dt_entrega'=>$dados['dt_entrega'],
            'taxa_frete'=>$dados['taxa_frete'],
            'descricao'=>$dados['descricao'],
            'status'=>$dados['status'],
            'cep'=>$dados['cep'],
            'cidade'=>$dados['cidade'],
            'estado'=>$dados['estado'],
            'endereco'=>$dados['endereco'],
            'numero'=>$dados['numero'],
            'tipo_frete'=>$dados['tipo_frete'],
            'cod_rastreio'=>$dados['cod_rastreio']
        ]);

        $id_entrega = $entrega->id;
        $id_pedido = $dados['pedido_id'];
            
            DadosEntrega::create([
                'entrega_id'=> $id_entrega,
                'pedido_id'=>$id_pedido,
            ]);
        
            return redirect()->route('entregas.store')->with('Entrega cadastrada com sucesso!');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrega = Entrega::findOrFail($id);
        $funcionario = ModelsFuncionario::find($entrega->models_funcionario_id);
        $dados_entregas = DadosEntrega::firstWhere('entrega_id', $entrega->id);
        $pedido = Pedido::firstWhere('id', $dados_entregas->pedido_id);
        $pedido_cliente = $pedido->models_cliente;
        $nome_cliente = $pedido_cliente->nome_razaosocial;
        $nome_funcionario = $funcionario->nome;

        return view('entrega.show', [
            'pedido'=>$pedido,
            'nome_cliente'=>$nome_cliente,
            'pedido_cliente'=>$pedido_cliente,
            'funcionario'=>$funcionario,
            'nome_funcionario'=>$nome_funcionario,
            'entrega'=>$entrega
        ]);
    }

    public function entregas(){
        $entregas = EntregaController::getEntregas();
        
        $entregas = DB::table('entregas')
        ->join('models_funcionarios', 'models_funcionarios.id', '=', 'entregas.models_funcionario_id')
        ->join('dados_entregas', 'entregas.id', '=', 'dados_entregas.entrega_id')
        ->join('pedidos', 'dados_entregas.pedido_id', '=', 'pedidos.id')
        ->join('models_clientes', 'pedidos.models_cliente_id', '=', 'models_clientes.id')
        ->select('models_clientes.nome_razaosocial', 'pedido_id','entregas.id', 'entregas.models_funcionario_id', 'models_funcionarios.nome', 'dt_entrega', 'taxa_frete', 'entregas.cidade', 'entregas.status', 'entregas.created_at')
        ->orderByRaw('created_at DESC')
        ->get();

        return view('entrega.index',[
            'entregas'=>$entregas
        ]);
    }

    public function entregasFiltraStatus(Request $request)
    {
        $status = $request->get('status');

        if($status == 'todos'){
            $entregas = EntregaController::getEntregas();
            return view('entrega.index', compact('entregas'));
        }

        $entregas = DB::table('entregas')
        ->join('models_funcionarios', 'models_funcionarios.id', '=', 'entregas.models_funcionario_id')
        ->select('entregas.id', 'entregas.models_funcionario_id', 'models_funcionarios.nome', 'dt_entrega', 'taxa_frete', 'cidade', 'status', 'entregas.created_at')
        ->where('entregas.status', '=', $status)
        ->orderByRaw('created_at DESC')
        ->get();

        return view('entrega.index', compact('entregas'));
    }

    public static function getEntregas()
    {
        $entregas = DB::table('entregas')
        ->join('models_funcionarios', 'models_funcionarios.id', '=', 'entregas.models_funcionario_id')
        ->select('entregas.id', 'entregas.models_funcionario_id', 'models_funcionarios.nome', 'dt_entrega', 'taxa_frete', 'cidade', 'status', 'entregas.created_at')
        ->orderByRaw('created_at DESC')
        ->get();

        return $entregas;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = (int)$id;
        $entregas = Entrega::findOrFail($id);
        $models_funcionarios = ModelsFuncionario::all();
        $funcionario = ModelsFuncionario::find($entregas->models_funcionario_id);
        $dados_entregas = DadosEntrega::firstWhere('entrega_id', $entregas->id);
        
        $pedido = DB::table('pedidos')
        ->where('pedidos.id', '=', $dados_entregas->pedido_id)
        ->select('pedidos.models_cliente_id', 'pedidos.id')
        ->get();
        
        $pedido = Pedido::find($pedido[0]->id);
        $pedido_cliente = $pedido->models_cliente;
        $nome_cliente = $pedido_cliente->nome_razaosocial;

        return view('entrega.edit', [
            'entregas' => $entregas,
            'funcionario' => $funcionario,
            'models_funcionarios' => $models_funcionarios,
            'pedido' => $pedido,
            'pedido_cliente' => $pedido_cliente,
            'nome_cliente' => $nome_cliente
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $entrega = Entrega::findOrFail($id);

        $entrega->update([
            'models_funcionario_id'=>$request->models_funcionario_id,
            'dt_entrega'=>$request->dt_entrega,
            'taxa_frete'=>$request->taxa_frete,
            'descricao'=>$request->descricao,
            'status'=>$request->status,
            'cep'=>$request->cep,
            'cidade'=>$request->cidade,
            'estado'=>$request->estado,
            'endereco'=>$request->endereco,
            'tipo_frete'=>$request->tipo_frete,
            'cod_rastreio'=>$request->cod_rastreio
        ]);

        return redirect('/admin/entregas/')->with('msg', 'Entrega editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}