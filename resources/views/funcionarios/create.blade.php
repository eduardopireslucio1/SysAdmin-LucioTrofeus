@extends('layouts.admin')
@section('title','Cadastrar Funcionário')
@section('content-header','Cadastrar Funcionário')

@section('content')

<script src="/js/cliente/clientes.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<div class="card">
    <div class="card-body">
        <form action="{{route('funcionarios.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nome: <span class="obrigatorio">*</span></label>
                <input placeholder="Ex: Marcos Lucio" type="text" name="nome"
                    class="form-control @error('nome') is-invalid @enderror" id="nome">
                @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>CPF: <span class="obrigatorio">*</span></label>
                <input placeholder="Ex: 111.111.111-11" type="text" name="cpf"
                    class="form-control @error('cpf') is-invalid @enderror" id="cpf">
                @error('cpf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Data de Nascimento: <span class="obrigatorio">*</span></label>
                <input placeholder="" type="text" name="dt_nascimento"
                    class="form-control @error('dt_nascimento') is-invalid @enderror" id="dt_nascimento">
                @error('dt_nascimento')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Data de Admissão: <span class="obrigatorio">*</span></label>
                <input placeholder="" type="text" name="dt_admissao"
                    class="form-control @error('dt_nascimento') is-invalid @enderror" id="dt_admissao">
                @error('dt_admissao')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Carga horária / dia: <span class="obrigatorio">*</span></label>
                <input placeholder="" type="text" name="carga_horaria"
                    class="form-control @error('carga_horaria') is-invalid @enderror" id="carga_horaria">
                @error('carga_horaria')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Cargo: <span class="obrigatorio">*</span></label>
                <input placeholder="" type="text" name="cargo"
                    class="form-control @error('cargo') is-invalid @enderror" id="cargo">
                @error('cargo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Salário: <span class="obrigatorio">*</span></label>
                <input placeholder="" type="text" name="salario"
                    class="form-control @error('salario') is-invalid @enderror" id="salario">
                @error('salario')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Cadastrar</button>

            <style>
            input[type=checkbox] {
                cursor: pointer;
                width: 22px;
            }

            .obrigatorio {
                color: red;
            }
            </style>

            <script>

            var cleave = new Cleave('#cpf', {
                delimiters: ['.', '.', '-'],
                blocks: [3, 3, 3, 2],
                numericOnly: true
            });

            var cleave = new Cleave('#dt_nascimento', {
                delimiters: ['/', '/', ''],
                blocks: [2, 2, 4],
                numericOnly: true
            });

            var cleave = new Cleave('#dt_admissao', {
                delimiters: ['/', '/', ''],
                blocks: [2, 2, 4],
                numericOnly: true
            });


            </script>

        </form>
    </div>
</div>

@endsection