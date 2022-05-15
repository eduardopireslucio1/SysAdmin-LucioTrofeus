<?php

namespace App\Http\Controllers;

use App\Models\ModelsFuncionario;
use Illuminate\Http\Request;
use App\Http\Requests\FuncionarioStoreRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models_funcionarios = ModelsFuncionario::latest()->paginate(10);
        return view('funcionarios.index')->with('models_funcionarios',$models_funcionarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioStoreRequest $request)
    {
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
        $funcionario = ModelsFuncionario::findOrFail($id);

        return view('funcionarios.edit', ['models_funcionarios' => $funcionario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FuncionarioStoreRequest $request, $id)
    {
        $Funcionario = ModelsFuncionario::findOrFail($id);

        $Funcionario -> update([
            
            'nome'=>$request->nome,
            'cpf'=>$request->cpf,
            'dt_nascimento' => DateTime::createFromFormat('d/m/Y', $request->dt_nascimento),
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
        ModelsFuncionario::findOrFail($id)->delete();

        return redirect('/admin/funcionarios/')->with('msg', 'Cliente excluído com sucesso!');
    }
}
