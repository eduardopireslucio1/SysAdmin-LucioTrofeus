<?php

namespace App\Http\Controllers;


use App\Models\ModelsProduto;
use App\Models\ModelsCliente;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\ItensPedido;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
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
        $models_produtos = modelsProduto::all();
        $models_clientes = modelsCliente::all();
        return view('pedidos.create')->with('models_produtos',$models_produtos)->with('models_clientes',$models_clientes);
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
        $pedido = Pedido::create([
            'models_cliente_id'=>$dados['models_cliente_id'],
            'valor_total'=>$dados['valor_total'],
            'imagem_cartaz'=>'',
            'data_entrega'=>$dados['data_entrega'],
            'descricao'=>$dados['descricao'],
            'status'=>$dados['status']
    
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
    public function show($id)
    {
        $pedidos = Pedido::findOrFail($id);
        $itens_pedidos = DB::table('itens_pedidos')
        ->where('pedido_id', '=', $id)
        ->join('models_produtos', 'models_produtos.id', '=', 'itens_pedidos.models_produto_id')
        ->select('itens_pedidos.id', 'itens_pedidos.models_produto_id', 'models_produtos.nome', 'quantidade', 'tamanho', 'valor', 'status')
        ->get();


        $models_clientes = ModelsCliente::findOrFail($pedidos->models_cliente_id);
        

        return view('pedidos.show', ['models_clientes' => $models_clientes, 'pedidos' => $pedidos,'itens_pedidos' => $itens_pedidos]);
    }

    public function pedidos(Pedido $pedido)
    {
        $pedidos = DB::table('pedidos')
        ->join('models_clientes', 'models_clientes.id', '=', 'pedidos.models_cliente_id')
        ->select('pedidos.id', 'pedidos.models_cliente_id', 'models_clientes.nome_razaosocial', 'data_entrega','valor_total', 'status')
        ->get();
        return view('pedidos.index')->with('pedidos',$pedidos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedidos = Pedido::findOrFail($id);

        $models_clientes = ModelsCliente::findOrFail($pedidos->models_cliente_id);

        $itens_pedidos = DB::table('itens_pedidos')
        ->where('pedido_id', '=', $id)
        ->join('models_produtos', 'models_produtos.id', '=', 'itens_pedidos.models_produto_id')
        ->select('itens_pedidos.id', 'itens_pedidos.models_produto_id', 'models_produtos.nome', 'quantidade', 'tamanho', 'valor', 'status')
        ->get();

        return view('pedidos.edit', ['pedidos' => $pedidos, 'models_clientes' => $models_clientes, 'itens_pedidos' => $itens_pedidos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);

        $pedido->update([
            
            'status'=>$request->status,
            'descricao'=>$request->descricao
        
        ]);

        return redirect('/admin/pedidos/')->with('msg', 'Pedido editado com sucesso!');
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
