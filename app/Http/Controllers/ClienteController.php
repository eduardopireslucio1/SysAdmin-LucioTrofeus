<?php

namespace App\Http\Controllers;

use App\Models\ModelsCliente;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteStoreRequest;
use Illuminate\Support\Facades\DB;
use App\Validation\CPF;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tempedido = false;
        $podeExcluirCliente = false;
        $models_clientes = modelsCliente::latest()->paginate(10);
        return view('clientes.index')->with('models_clientes',$models_clientes)->with('tempedido', $tempedido)->with('podeExcluirCliente', $podeExcluirCliente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $validar_cpf = true;
        $opcao = $request->opcao;

        if($opcao == "cnpj") {
            return view('clientes.clientecnpj', compact('opcao'));
        } 

        return view('clientes.clientecpf', compact('opcao', 'validar_cpf'));
    
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
        if(isset($request->cpf)){

            $validar_cpf = CPF::validaCPF($request->cpf);
    
            if(!$validar_cpf){
            return view('clientes.clientecpf', compact('validar_cpf'));
            }
        }


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
        $models_clientes = ModelsCliente::findOrFail($id);
        $validar_cpf = true;

        return view('clientes.edit', [
            'models_clientes' => $models_clientes,
            'validar_cpf' => $validar_cpf
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModelsCliente  $modelsCliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteStoreRequest $request, $id)
    {
        $models_clientes = ModelsCliente::findOrFail($id);

        if(isset($request->cpf)){
            $validar_cpf = CPF::validaCPF($request->cpf);

            if(!$validar_cpf){
            return view('clientes.edit', compact('validar_cpf', 'models_clientes'));
            }   
        }

        $models_clientes->update([
            
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
        $models_clientes = modelsCliente::latest()->paginate(10);
        $pedido = DB::table('pedidos')
        ->select('pedidos.id')
        ->where('pedidos.models_cliente_id', '=', $id)
        ->first();
        if($pedido){
            $tempedido = true;
            return view('clientes.index')->with('models_clientes',$models_clientes)->with('tempedido', $tempedido);
        }else{
            $podeExcluirCliente = true;
            $tempedido = false;
            ModelsCliente::findOrFail($id)->delete();
            $models_clientes = modelsCliente::latest()->paginate(10);
            return view('clientes.index')->with('models_clientes',$models_clientes)->with('tempedido', $tempedido)->with('podeExcluirCliente',$podeExcluirCliente);
        }
    }
}