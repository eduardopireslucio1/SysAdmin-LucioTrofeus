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
        $cliente_cadastrado = null;
        $opcao = $request->opcao;

        if($opcao == "cnpj") {
            return view('clientes.clientecnpj', compact('opcao', 'cliente_cadastrado'));
        } 

        return view('clientes.clientecpf', compact('opcao', 'validar_cpf', 'cliente_cadastrado'));
    
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

        $models_clientes = ModelsCliente::all();
        $validar_cpf = true;
        $cliente_cadastrado = null;
        
        foreach($models_clientes as $cliente){
            if($cliente->inTipo == 'PJ'){
                if($cliente->cnpj == $request->cnpj){
                    $cliente_cadastrado = true;
                    return view('clientes.clientecnpj', compact('cliente_cadastrado', 'validar_cpf'));
                }
            }

            if($cliente->inTipo == 'PF'){
                if($cliente->cpf == $request->cpf){
                    $cliente_cadastrado = true;
                    return view('clientes.clientecpf', compact('cliente_cadastrado', 'validar_cpf'));
                }
            }
        }

        if(isset($request->cpf)){
            $validar_cpf = CPF::validaCPF($request->cpf);
    
            if(!$validar_cpf){
            return view('clientes.clientecpf', compact('validar_cpf'));
            }

            $inTipo = 'PF';
        }

        if(isset($request->cnpj)){
            $inTipo = 'PJ';
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
            'observacao'=>$request->observacao,
            'inTipo'=>$inTipo

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

        if(isset($models_clientes->cpf)){
            return view('clientes.editclientecpf', compact('models_clientes', 'validar_cpf'));
        }

        if(isset($models_clientes->cnpj)){
            return view('clientes.editclientecnpj', compact('models_clientes', 'validar_cpf'));
        }

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
                return view('clientes.editclientecpf', compact('models_clientes', 'validar_cpf'));
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