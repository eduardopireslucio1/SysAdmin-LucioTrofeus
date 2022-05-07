@extends('layouts.admin')
@section('title', $models_materials->nome)

@section('content')

<div class="col-md-10 offset-md-0.5">
        <div id="info-container" class="col-md-6">
            <h2><strong>Informações do Material</strong></h2>
            <h3>Dados pessoais</h3>
            <div class="form-group">
                <strong>Nome:</strong><input type="text" class="form-control" disabled value="{{($models_materials->nome)}}">
            </div>

            <div class="form-group">
                <strong>Descrição:</strong><input type="text" class="form-control" disabled value="{{($models_materials->descricao)}}">
            </div>

            <div class="form-group">
                <strong>Quantidade:</strong><input type="text" class="form-control" disabled value="{{($models_materials->quantidade)}}">
            </div>

            <div class="form-group">
                <strong>Preço:</strong><input type="text" class="form-control" disabled value="R$ {{number_format($models_materials->preco, 2, ',', '.')}}">
            </div>

        </div>
</div>


@endsection