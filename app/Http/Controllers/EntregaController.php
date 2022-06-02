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
        $pedidos = DB::table('pedidos')
        ->join('models_clientes', 'models_clientes.id', '=', 'pedidos.models_cliente_id')
        ->select('pedidos.id', 'pedidos.models_cliente_id', 'models_clientes.nome_razaosocial', 'pedidos.status')
        ->get();
        return view('entrega.create')->with('models_funcionarios',$models_funcionarios)->with('pedidos',$pedidos);
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
            'cidade'=>$dados['cidade'],
            'endereco'=>$dados['endereco'],
            'numero'=>$dados['numero'],
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
            'nome_funcionario'=>$nome_funcionario,
            'entrega'=>$entrega
        ]);
    }

    public function entregas(){
        $entregas = DB::table('entregas')
        ->join('models_funcionarios', 'models_funcionarios.id', '=', 'entregas.models_funcionario_id')
        ->select('entregas.id', 'entregas.models_funcionario_id', 'models_funcionarios.nome', 'dt_entrega', 'taxa_frete', 'cidade', 'status', 'entregas.created_at')
        ->orderByRaw('created_at DESC')
        ->get();

        return view('entrega.index',[
            'entregas'=>$entregas
        ]);
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

        //$pedido_cliente = DB::table('dados_entregas')
        //->join('pedidos', 'pedidos.id', '=', 'dados_entregas.pedido_id')
        //->select('dados_entregas.id', 'dados_entregas.pedido_id', 'pedidos.models_cliente_id')
        //->get();

        //$cliente = DB::table('models_clientes')
        //->where('models_clientes.id', '=', $pedido_cliente[0]->models_cliente_id)
        //->select('models_clientes.id', 'models_clientes.nome_razaosocial')
        //->get();
        
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
            'cidade'=>$request->cidade,
            'endereco'=>$request->endereco,
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