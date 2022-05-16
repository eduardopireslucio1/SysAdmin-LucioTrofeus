@extends('layouts.admin')
@section('title', $models_produtos->produtos)

@section('content')


<div class="container-fluid">
    <div style="padding:0px;" class="col-md-12">
        <div class="painel panel-default">
            <div class="painel-heading" style="margin-top:8px !important;color: black">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="form-group">
                            <h3><strong>Nome do produto:</strong></h3><input style="width:20%" type="text" class="form-control" disabled
                                value="{{($models_produtos->nome)}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="image-container" class="col-md-6">
                        <img src="/images/produtos/{{$models_produtos->imagem}}" class="img-fluid" alt="">
                    </div>
                    <div id="info-container" class="col-md-6">
                        <div class="form-group">
                            <strong>Descrição:</strong><input type="text" class="form-control" disabled
                                value="{{($models_produtos->descricao)}}">
                        </div>
                        <div class="form-group">
                            <strong>Preço:</strong><input type="text" class="form-control" disabled
                                value="R$ {{number_format($models_produtos->preco, 2, ',', '.')}}">
                        </div>

                        @if($models_produtos->status == 0)

                        <a class="btn btn-danger btn-sm" style="background-color: red; color: white">Inativo</a>
                        @else
                        <a class="btn btn-sucess btn-sm" style="background-color: green; color: white">Ativo</a>

                        @endif


                        </p>
                        <p class="produto-material">
                            <strong>Materiais: </strong>
                            @foreach ($models_produtos->material as $material)
                            <li>{{$material}}</li>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection