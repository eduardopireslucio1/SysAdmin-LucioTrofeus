@extends('layouts.admin')
@section('title','Edição de Produtos')
@section('content')
<h1>Editar Produto {{}}</h1>
<div class="card">
    <div class="card-body">
    @foreach ($models_produtos as $produto)
        <form action="{{route('produtos.update', $id)}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nome do produto: </label>
                <input placeholder="Nome" type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="nome" value="{{$produto->nome}}">
                @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Descrição do produto: </label>
                <textarea placeholder="Descrição"type="text" name="descricao" class="form-control @error('descricao') is-invalid @enderror"
                    id="descricao">{{old('descricao')}}</textarea>
                @error('descricao')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Enviar imagem (referência): </label>
                <div class="custom-file">
                    <input type="file" id="imagem" class="custom-file-input" name="imagem" value="{{old('imagem')}}">
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
                <input placeholder="preço"type="text" name="preco" class="form-control @error('preco') is-invalid @enderror" id="preco">
                @error('preco')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Material a utilizar: </label>
                <input type="checkbox" name="material" class="form-control @error('material') is-invalid @enderror"
                    id="material">Acrílico</input>
                <input type="checkbox" name="material" class="form-control @error('material') is-invalid @enderror"
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
                    <option value="1" {{old('status'==1 ? 'selected' : '')}}>Ativo</option>
                    <option value="0" {{old('status'==0 ? 'selected' : '')}}>Inativo</option>
                </select>
                @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Cadastrar produto</button>

            <style>
            input[type=checkbox] {
                cursor: pointer;
                width: 22px;
            }
            </style>
        </form>
        @endforeach
    </div>
</div>
@endsection
@endsection