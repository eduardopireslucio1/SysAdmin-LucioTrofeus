<?php

namespace App\Http\Controllers;

use App\Models\ModelsCliente;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteStoreRequest;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models_clientes = modelsCliente::latest()->paginate(10);
        return view('clientes.index')->with('models_clientes',$models_clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('clientes.create');
    }

    public function createcpf(){
        return view('clientescpf.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteStoreRequest $request)
    {

        $modelsCliente = ModelsCliente::create([
            
            'nome_razaosocial'=>$request->nome_razaosocial,
            'fantasia'=>$request->fantasia,
            'email'=>$request->email,
            'telefone'=>$request->telefone,
            'cpf'=>$request->cpf,
            'cnpj'=>$request->cnpj,
            'cep'=>$request->cep,
            'cidade'=>$request->cidade,
            'uf'=>$request->uf,
            'logradouro'=>$request->logradouro,
            'numero'=>$request->numero,
            'observacao'=>$request->observacao

        ]);

        if(!$modelsCliente){
            return redirect()->back()->with('Não foi possível cadastrar esse cliente!');
        }
        return redirect()->route('clientes.store')->with('Cliente cadastrado com sucesso!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ModelsCliente  $modelsCliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $models_clientes = ModelsCliente::findOrFail($id);

        return view('clientes.show', ['models_clientes' => $models_clientes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModelsCliente  $modelsCliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = ModelsCliente::findOrFail($id);

        return view('clientes.edit', ['models_clientes' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModelsCliente  $modelsCliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = ModelsCliente::findOrFail($id);

        $cliente->update([
            
            'nome_razaosocial'=>$request->nome_razaosocial,
            'fantasia'=>$request->fantasia,
            'email'=>$request->email,
            'telefone'=>$request->telefone,
            'cpf'=>$request->cpf,
            'cnpj'=>$request->cnpj,
            'cep'=>$request->cep,
            'cidade'=>$request->cidade,
            'uf'=>$request->uf,
            'logradouro'=>$request->logradouro,
            'numero'=>$request->numero,
            'observacao'=>$request->observacao

        ]);

        return redirect('/admin/clientes/')->with('msg', 'Cliente editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModelsCliente  $modelsCliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = DB::table('pedidos')
        ->select('pedidos.id')
        ->where('pedidos.models_cliente_id', '=', $id)
        ->first();

        if($pedido){
            return redirect()->back()->withErrors('msg', 'Contém ao menos um pedido com este cliente!');
        }

        ModelsCliente::findOrFail($id)->delete();

        return redirect('/admin/clientes/')->with('msg', 'Cliente excluído com sucesso!');
    }
}
