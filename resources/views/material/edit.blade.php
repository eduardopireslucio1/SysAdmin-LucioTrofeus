@extends('layouts.admin')
@section('title','Edição de Material')
@section('content')
<h1>Editar Material: {{$models_materials->nome}}</h1>
<div class="card">
    <div class="card-body">
        <form action="/admin/material/{{$models_materials->id}}" method="POST" enctype="multipart/form-data">
        <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nome: </label>
                <input placeholder="nome" type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="nome" value="{{$models_materials->nome}}">
                @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Descrição: </label>
                <input placeholder="Descrição" type="text" name="descricao" class="form-control @error('descricao') is-invalid @enderror" id="descricao" value="{{$models_materials->descricao}}">
                @error('descricao')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Quantidade: </label>
                <input placeholder="Descrição" type="text" name="quantidade" class="form-control @error('quantidade') is-invalid @enderror" id="quantidade" value="{{$models_materials->quantidade}}">
                @error('quantidade')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Preço: </label>
                <input placeholder="Preço" type="text" name="preco" class="form-control @error('preco') is-invalid @enderror" id="preco" value="{{$models_materials->preco}}">
                @error('preco')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <input class="btn btn-primary" type="submit" value="Editar Material">

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
        </form>
    </div>
</div>
@endsection
