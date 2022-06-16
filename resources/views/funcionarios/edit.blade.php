@extends('layouts.admin')
@section('title','Edição de Funcionários')
@section('content')


<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<div class="container-fluid">
    <div class="padding:0px;" class="col-md-12">
        <div class="painel-heading" style="margin-top:8px !important;color: black">
            <div class="card card-info">
                <div class="card-header">
                    <h3><strong>Edição do funcionário</strong></h3>
                </div>
            </div>

            <form action="/admin/funcionarios/{{$models_funcionarios->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row" style="margin-bottom:6vh">
                    <div class="col-3">
                        <label>Nome: </label>
                        <input placeholder="nome" type="text" name="nome"
                            class="form-control @error('nome') is-invalid @enderror" id="nome"
                            value="{{$models_funcionarios->nome}}">
                        @error('nome')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label>CPF: </label>
                        <input placeholder="cpf" type="text" name="cpf"
                            class="form-control @error('cpf') is-invalid @enderror" id="cpf"
                            value="{{$models_funcionarios->cpf}}">
                        @error('cpf')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label>Data de nascimento: </label>
                        <input placeholder="dt_nascimento" type="text" name="dt_nascimento"
                            class="form-control @error('dt_nascimento') is-invalid @enderror" id="dt_nascimento"
                            value="{{ \Carbon\Carbon::parse($models_funcionarios->dt_nascimento)->format('d/m/Y')}}">
                        @error('dt_nascimento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label>Data de admissão: </label>
                        <input placeholder="dt_admissao" type="text" name="dt_admissao"
                            class="form-control @error('dt_admissao') is-invalid @enderror" id="dt_admissao"
                            value="{{ \Carbon\Carbon::parse($models_funcionarios->dt_admissao)->format('d/m/Y')}}">
                        @error('dt_admissao')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row" style="margin-bottom:6vh">
                    <div class="col-3">
                        <label>Carga horária / dia: </label>
                        <input placeholder="carga_horaria" type="text" name="carga_horaria"
                            class="form-control @error('carga_horaria') is-invalid @enderror" id="carga_horaria"
                            value="{{$models_funcionarios->carga_horaria}}">
                        @error('carga_horaria')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label>Cargo: </label>
                        <input placeholder="cargo" type="text" name="cargo"
                            class="form-control @error('cargo') is-invalid @enderror" id="cargo"
                            value="{{$models_funcionarios->cargo}}">
                        @error('cargo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label>Salário: </label>
                        <input placeholder="salario" type="text" name="salario"
                            class="form-control @error('salario') is-invalid @enderror" id="salario"
                            value="{{$models_funcionarios->salario}}">
                        @error('salario')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
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