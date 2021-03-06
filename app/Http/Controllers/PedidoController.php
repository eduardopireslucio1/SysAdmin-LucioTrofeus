<?php

namespace App\Http\Controllers;


use App\Models\ModelsProduto;
use App\Models\ModelsCliente;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\ItensPedido;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            // 'imagem_cartaz'=>$imagemName,
            'data_entrega'=>$dados['data_entrega'],
            'descricao'=>$dados['descricao'],
            'status'=>$dados['status'],
    
        ]);

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
        
        return view('pedidos.show', [
            'models_clientes' => $models_clientes,
            'pedidos' => $pedidos,
            'itens_pedidos' => $itens_pedidos,
        ]);
    }

    public function download( $corel = '' )
    {
        $file_path = public_path() . "/corel/" . $corel;
        $headers = array(
            'Content-Type: cdr',
            'Content-Disposition: attachment; filename='.$corel,
        );
        if ( file_exists( $file_path ) ) {
            return \Response::download( $file_path, $corel, $headers );
        } else {
            exit( 'Requested file does not exist on our server!' );
        }
    }

    public static function getPedidos(){
        $pedidos = DB::table('pedidos')
        ->join('models_clientes', 'models_clientes.id', '=', 'pedidos.models_cliente_id')
        ->select('pedidos.id', 'pedidos.models_cliente_id', 'models_clientes.nome_razaosocial', 'data_entrega','valor_total', 'status', 'pedidos.created_at')
        ->orderByRaw('pedidos.created_at DESC')
        ->get();

        return $pedidos;
    }

    public function pedidos(Pedido $pedido)
    {
        $pedidos = PedidoController::getPedidos();
        return view('pedidos.index')->with('pedidos',$pedidos);
    }

    public function searchPedidos(Request $request)
    {
      
        if ($request->has('search')) {
            $pedidos = DB::table('pedidos')
            ->join('models_clientes', 'models_clientes.id', '=', 'pedidos.models_cliente_id')
            ->select('pedidos.id', 'pedidos.models_cliente_id', 'models_clientes.nome_razaosocial', 'data_entrega','valor_total', 'status', 'pedidos.created_at')
            ->where('models_clientes.nome_razaosocial', 'LIKE', '%' . $request->search . '%')
            ->orderByRaw('pedidos.created_at DESC')
            ->get();
        }

        return view('pedidos.index', compact('pedidos'));
    }

    public function pedidosFiltraStatus(Request $request)
    {

        $status = $request->get('status');

        if($status == 'todos'){
            $pedidos = PedidoController::getPedidos();
            return view('pedidos.index', compact('pedidos'));
        }

        $pedidos = DB::table('pedidos')
        ->join('models_clientes', 'models_clientes.id', '=', 'pedidos.models_cliente_id')
        ->select('pedidos.id', 'pedidos.models_cliente_id', 'models_clientes.nome_razaosocial', 'data_entrega','valor_total', 'status', 'pedidos.created_at')
        ->where('pedidos.status', '=', $status)
        ->orderByRaw('pedidos.created_at DESC')
        ->get();

        return view('pedidos.index', compact('pedidos'));

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

        if($request->hasFile('corel') && $request->file('corel')->isValid()){
            $dadosCorel = $request->corel;
            $extension = $dadosCorel->extension();
            $corelName = $dadosCorel->getClientoriginalName(). "." . $extension;
            $dadosCorel->move(public_path('corel'), $corelName);
        }else{
            $corelName = $pedido->corel;
        }
        if($request->hasFile('imagem_cartaz')){
            $imagemCartaz = $request->imagem_cartaz;
            $extension = $imagemCartaz->extension();
            $imagemName = $imagemCartaz->getClientoriginalName(). "." . $extension;
            $imagemCartaz->move(public_path('images/pedidos'), $imagemName);
        }else{
            $imagemName = $pedido->imagem_cartaz;
        }

        $pedido->update([
            
            'status'=>$request->status,
            'descricao'=>$request->descricao,
            'corel'=>$corelName,
            'imagem_cartaz'=>$imagemName
        
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