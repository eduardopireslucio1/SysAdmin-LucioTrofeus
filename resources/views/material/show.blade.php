@extends('layouts.admin')
@section('title', $models_materials->nome)

@section('content')

<div class="container-fluid">
    <div style="padding:0px;" class="col-md-12">
        <div class="painel panel-default">
            <div class="painel-heading" style="margin-top:8px !important;color: black">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"><b>Informações do Material</b></h3>
                    </div>
                </div>
                <div id="info-container" class="col-md-6">
                    <div class="form-group">
                        <strong>Nome:</strong><input type="text" class="form-control" disabled
                            value="{{($models_materials->nome)}}">
                    </div>

                    <div class="form-group">
                        <strong>Descrição:</strong><input type="text" class="form-control" disabled
                            value="{{($models_materials->descricao)}}">
                    </div>

                    <div class="form-group">
                        <strong>Quantidade:</strong><input type="text" class="form-control" disabled
                            value="{{($models_materials->quantidade)}}">
                    </div>

                    <div class="form-group">
                        <strong>Preço:</strong><input type="text" class="form-control" disabled
                            value="R$ {{number_format($models_materials->preco, 2, ',', '.')}}">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection