<?php

namespace App\Http\Controllers;

use App\Models\ModelsFuncionario;
use App\Models\Entrega;
use Illuminate\Http\Request;
use App\Http\Requests\FuncionarioStoreRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use App\Validation\CPF;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temEntrega = false;
        $podeExcluirFuncionario = false;
        $models_funcionarios = DB::table('models_funcionarios')->orderByRaw('created_at DESC')->paginate(10);
        return view('funcionarios.index')
        ->with('models_funcionarios',$models_funcionarios)
        ->with('temEntrega',$temEntrega)
        ->with('podeExcluirFuncionario',$podeExcluirFuncionario);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validar_cpf = true;
        return view('funcionarios.create')->with('validar_cpf', $validar_cpf);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioStoreRequest $request)
    {   

        $validar_cpf = CPF::validaCPF($request->cpf);

        if(!$validar_cpf){
            return view('funcionarios.create')->with('validar_cpf', $validar_cpf);
        }

        $Funcionario = ModelsFuncionario::create([
            
            'nome'=>$request->nome,
            'cpf'=>$request->cpf,
            'dt_nascimento' => DateTime::createFromFormat('d/m/Y', $request->dt_nascimento),
            'dt_admissao' => DateTime::createFromFormat('d/m/Y', $request->dt_admissao),
            'carga_horaria'=>$request->carga_horaria,
            'cargo'=>$request->cargo,
            'salario'=>$request->salario,
        ]);

        if(!$Funcionario){
            return redirect()->back()->with('Não foi possível cadastrar esse funcionário!');
        }
        return redirect()->route('funcionarios.store')->with('Funcionário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $models_funcionarios = ModelsFuncionario::findOrFail($id);

        return view('funcionarios.show', ['models_funcionarios' => $models_funcionarios]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $validar_cpf = true;
        $models_funcionarios = ModelsFuncionario::findOrFail($id);

        return view('funcionarios.edit', [
            'models_funcionarios' => $models_funcionarios,
            'validar_cpf' => $validar_cpf
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
        $models_funcionarios = ModelsFuncionario::findOrFail($id);

        $models_funcionarios -> update([
            'nome'=>$models_funcionarios->nome,
            'cpf'=>$models_funcionarios->cpf,
            'dt_nascimento' => $models_funcionarios->dt_nascimento,
            'dt_admissao' => DateTime::createFromFormat('d/m/Y', $request->dt_admissao),
            'carga_horaria'=>$request->carga_horaria,
            'cargo'=>$request->cargo,
            'salario'=>$request->salario,
            
        ]);

        return redirect('/admin/funcionarios/')->with('success', 'Funcionário editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $models_funcionarios = modelsFuncionario::latest()->paginate(10);
        $entrega = DB::table('entregas')
        ->select('entregas.id')
        ->where('entregas.models_funcionario_id', '=', $id)
        ->first();

        if($entrega){
            $temEntrega = true;
            $podeExcluirFuncionario = false;
            return view('funcionarios.index')->with('models_funcionarios',$models_funcionarios)->with('temEntrega',$temEntrega);
        }else{
            $podeExcluirFuncionario = true;
            $temEntrega = false;
            ModelsFuncionario::findOrFail($id)->delete();
            $models_funcionarios = modelsFuncionario::latest()->paginate(10);
            return view('funcionarios.index')->with('models_funcionarios',$models_funcionarios)->with('temEntrega',$temEntrega)->with('podeExcluirFuncionario', $podeExcluirFuncionario);
        }
    }
}