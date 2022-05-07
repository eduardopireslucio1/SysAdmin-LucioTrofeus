@extends('layouts.admin')
@section('title', $models_funcionarios->nome)

@section('content')

<div class="col-md-10 offset-md-0.5">
        <div id="info-container" class="col-md-6">
            <h2><strong>Informações do Funcionário</strong></h2>
            <h3>Dados pessoais</h3>
            <div class="form-group">
                <strong>Nome:</strong><input type="text" class="form-control" disabled value="{{($models_funcionarios->nome)}}">
            </div>

            <div class="form-group">
                <strong>CPF:</strong><input type="text" class="form-control" disabled value="{{($models_funcionarios->cpf)}}">
            </div>

            <div class="form-group">
                <strong>Data de nascimento:</strong><input type="text" class="form-control" disabled value="{{ \Carbon\Carbon::parse($models_funcionarios->dt_nascimento)->format('d/m/Y')}}">
            </div>

            <div class="form-group">
                <strong>Data de admissão:</strong><input type="text" class="form-control" disabled value="{{ \Carbon\Carbon::parse($models_funcionarios->dt_admissao)->format('d/m/Y')}}">
            </div>

            <div class="form-group">
                <strong>Carga horária / por dia:</strong><input type="text" class="form-control" disabled value="{{($models_funcionarios->carga_horaria)}}">
            </div>

            <div class="form-group">
                <strong>Cargo:</strong><input type="text" class="form-control" disabled value="{{($models_funcionarios->cargo)}}">
            </div>

            <div class="form-group">
                <strong>Salário:</strong><input type="text" class="form-control" disabled value="R$ {{number_format($models_funcionarios->salario, 2, ',', '.')}}">
            </div>

        </div>
</div>


@endsection