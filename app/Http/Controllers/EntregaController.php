<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\ModelsFuncionario;
use App\Models\ModelsClientes;
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
        //
    }

    public function entregas(){
        $entregas = DB::table('entregas')
        ->join('models_funcionarios', 'models_funcionarios.id', '=', 'entregas.models_funcionario_id')
        ->select('entregas.id', 'entregas.models_funcionario_id', 'models_funcionarios.nome', 'dt_entrega', 'taxa_frete', 'cidade', 'status')
        ->get();
        return view('entrega.index')->with('entregas', $entregas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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