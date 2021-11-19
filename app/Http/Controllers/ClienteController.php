<?php

namespace App\Http\Controllers;

use App\Models\ModelsCliente;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteStoreRequest;

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
            'email'=>$request->email,
            'telefone'=>$request->telefone,
            'cpf'=>$request->cpf,
            'cnpj'=>$request->cnpj,
            'cep'=>$request->cep,
            'cidade'=>$request->cidade,
            'uf'=>$request->uf,
            'rua'=>$request->rua,
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
    public function show(ModelsCliente $modelsCliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModelsCliente  $modelsCliente
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelsCliente $modelsCliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModelsCliente  $modelsCliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelsCliente $modelsCliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModelsCliente  $modelsCliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsCliente $modelsCliente)
    {
        //
    }
}
