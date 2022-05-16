@extends('layouts.admin')
@section('title','Edição de Funcionários')
@section('content')
<h1>Editar Funcionários: {{$models_funcionarios->nome}}</h1>
<div class="card">
    <div class="card-body">
        <form action="/admin/funcionarios/{{$models_funcionarios->id}}" method="POST" enctype="multipart/form-data">
        <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nome: </label>
                <input placeholder="nome" type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="nome" value="{{$models_funcionarios->nome}}">
                @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>CPF: </label>
                <input placeholder="cpf" type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror" id="cpf" value="{{$models_funcionarios->cpf}}">
                @error('cpf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Data de nascimento: </label>
                <input placeholder="dt_nascimento" type="text" name="dt_nascimento" class="form-control @error('dt_nascimento') is-invalid @enderror" id="dt_nascimento" value="{{ \Carbon\Carbon::parse($models_funcionarios->dt_nascimento)->format('d/m/Y')}}">
                @error('dt_nascimento')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Data de admissão: </label>
                <input placeholder="dt_admissao" type="text" name="dt_admissao" class="form-control @error('dt_admissao') is-invalid @enderror" id="dt_admissao" value="{{ \Carbon\Carbon::parse($models_funcionarios->dt_admissao)->format('d/m/Y')}}">
                @error('dt_admissao')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Carga horária / dia: </label>
                <input placeholder="carga_horaria" type="text" name="carga_horaria" class="form-control @error('carga_horaria') is-invalid @enderror" id="carga_horaria" value="{{$models_funcionarios->carga_horaria}}">
                @error('carga_horaria')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Cargo: </label>
                <input placeholder="cargo" type="text" name="cargo" class="form-control @error('cargo') is-invalid @enderror" id="cargo" value="{{$models_funcionarios->cargo}}">
                @error('cargo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Salário: </label>
                <input placeholder="salario" type="text" name="salario" class="form-control @error('salario') is-invalid @enderror" id="salario" value="{{$models_funcionarios->salario}}">
                @error('salario')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <input class="btn btn-primary" type="submit" value="Editar Funcionário">

            @if(session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
            @endif

            <style>
            input[type=checkbox] {
                cursor: pointer;
                width: 22px;
            }
            </style>

            <script>

            var cleave = new Cleave('#cpf', {
                delimiters: ['.', '.', '-'],
                blocks: [3, 3, 3, 2],
                numericOnly: true
            });

            </script>
        </form>
    </div>
</div>
@endsection
