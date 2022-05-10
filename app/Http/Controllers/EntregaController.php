<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\ModelsFuncionario;
use App\Models\Entrega;
use App\Models\DadosEntrega;
use Illuminate\Support\Facades\DB;

class EntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models_funcionarios = ModelsFuncionario::all();
        $pedidos = Pedido::all();
        return view('entrega.create')->with('models_funcionarios',$models_funcionarios)->with('pedidos',$pedidos);
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

        $entrega = Entrega::create([
            'models_funcionario_id'=>$dados['models_funcionario_id'], 
            'dt_entrega'=>$dados['dt_entrega'],
            'custo'=>$dados['custo'],
            'endereco'=>$dados['endereco'],
            'descricao'=>$dados['descricao'],
            'status'=>$dados['status'],
        ]);

        $id_entrega = $entrega->id;
        $id_pedido = $dados['pedido_id'];
            
            DadosEntrega::create([
                'entrega_id'=> $id_entrega,
                'pedido_id'=>$id_pedido,
            ]);
            //return view em alguma view relacionada a entrega
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