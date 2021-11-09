@extends('layouts.admin')
@section('title','Cadastrar Produtos')
@section('content-header','Cadastrar Produtos')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('produtos.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nome do produto: </label>
                <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="nome">
                @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Descrição do produto: </label>
                <textarea type="text" name="descricao" class="form-control @error('descricao') is-invalid @enderror"
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
                    <input type="file" id="image" class="custom-file-input" name="image" value="{{old('image')}}">
                    <label for="image" class="custom-file-label"> </label>  
                </div>
                @error('imagem')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Preço: </label>
                <input type="text" name="preco" class="form-control @error('preco') is-invalid @enderror" id="preco">
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
    </div>
</div>
@endsection