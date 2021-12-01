<?php

namespace App\Http\Controllers;


use App\Models\ModelsProduto;
use App\Models\ModelsCliente;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\ItensPedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models_produtos = modelsProduto::all();
        $models_clientes = modelsCliente::all();
        return view('pedidos.index')->with('models_produtos',$models_produtos)->with('models_clientes',$models_clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        echo 123;
        $pedido = Pedido::create([
            'models_cliente_id'=>$dados['models_cliente_id'],
            'valor_total'=>$dados['valor_total'],
            'imagem_cartaz'=>'',
            'data_entrega'=>'2021-11-30',
            'descricao'=>$dados['descricao']
    
        ]);
        // dd($pedido);
        

        $id_pedido = $pedido->id;
        $itens_pedido = $dados['itens'];

        echo json_encode($itens_pedido);

        foreach ( (array) $itens_pedido as $item){
            ItensPedido::create([
                'pedido_id'=>$id_pedido,
                'models_produto_id'=>$item['models_produto_id'],
                'quantidade'=>$item['quantidade'],
                'tamanho'=>$item['tamanho'],
                'valor'=>$item['valor']
            ]);

        }

        // if(!$pedido){
        //     return redirect()->back()->with('Não foi possível cadastrar esse cliente!');
        // }
        // return redirect()->route('clientes.store')->with('Cliente cadastrado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
