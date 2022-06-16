@extends('layouts.admin')
@section('title','Edição de Material')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<div class="container-fluid">
    <div class="padding:0px;" class="col-md-12">
        <div class="painel-heading" style="margin-top:8px !important;color: black">
            <div class="card card-info">
                <div class="card-header">
                    <h3><strong>Edição do material</strong></h3>
                </div>
            </div>
            <form action="/admin/material/{{$models_materials->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row" style="margin-bottom:6vh">
                    <div class="col-3">
                        <label>Nome: </label>
                        <input placeholder="nome" type="text" name="nome"
                            class="form-control @error('nome') is-invalid @enderror" id="nome"
                            value="{{$models_materials->nome}}">
                        @error('nome')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label>Descrição: </label>
                        <input placeholder="Descrição" type="text" name="descricao"
                            class="form-control @error('descricao') is-invalid @enderror" id="descricao"
                            value="{{$models_materials->descricao}}">
                        @error('descricao')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row" style="margin-bottom:6vh">
                    <div class="col-3">
                        <label>Quantidade: </label>
                        <input placeholder="Descrição" type="text" name="quantidade"
                            class="form-control @error('quantidade') is-invalid @enderror" id="quantidade"
                            value="{{$models_materials->quantidade}}">
                        @error('quantidade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label>Preço: </label>
                        <input placeholder="Preço" type="text" name="preco"
                            class="form-control @error('preco') is-invalid @enderror" id="preco"
                            value="{{$models_materials->preco}}">
                        @error('preco')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
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
</div>
@endsection