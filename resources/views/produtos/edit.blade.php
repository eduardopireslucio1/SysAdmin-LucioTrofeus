@extends('layouts.admin')
@section('title','Edição de Produtos')
@section('content')
<h1>Editar Produto: {{$models_produtos->nome}}</h1>
<div class="card">
    <div class="card-body">
        <form action="/admin/produtos/{{$models_produtos->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nome do produto: </label>
                <input placeholder="Nome" type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="nome" value="{{$models_produtos->nome}}">
                @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Descrição do produto: </label>
                <textarea placeholder="Descrição"type="text" name="descricao" class="form-control @error('descricao') is-invalid @enderror" 
                id="descricao">{{$models_produtos->descricao}}</textarea>
                @error('descricao')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Enviar imagem (referência): </label>

                <img src="/images/produtos/{{$models_produtos->imagem}}" width="230px" style="max-height: 230px">
                <div class="custom-file">
                    <input type="file" id="imagem" class="custom-file-input" name="imagem" value="/images/produtos/{{$models_produtos->imagem}}">
                    <label for="imagem" class="custom-file-label">Enviar imagem </label>  
                </div>
                @error('imagem')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Preço: </label>
                <input placeholder="preço"type="text" name="preco" class="form-control @error('preco') is-invalid @enderror" id="preco" value="{{$models_produtos->preco}}">
                @error('preco')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Material a utilizar: </label>
                <input type="checkbox" {{in_array("Acrilico", $models_produtos->material) ? "checked=''" : ""}} name="material[]" value="Acrilico" class="form-control @error('material') is-invalid @enderror"
                    id="material">Acrílico</input>
                <input type="checkbox" {{in_array("MDF", $models_produtos->material) ? "checked=''" : ""}} name="material[]" value="MDF" class="form-control @error('material') is-invalid @enderror"
                    id="material">MDF</input>
                @error('material')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Status: </label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="1" {{$models_produtos->status == 1 ? "selected='selected'" : ""}} >Ativo</option>
                    <option value="0" {{$models_produtos->status == 0 ? "selected='selected'" : ""}} >Inativo</option>
                </select>
                @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <input class="btn btn-primary" type="submit" value="Editar Produto">

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
