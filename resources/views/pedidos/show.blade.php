@extends('layouts.admin')
@section('title','Lista de pedidos')

@section('content')
<div class="col-md-10 offset-md-0.5">
    <div class="row">
        <div id="info-container" class="col-md-6">
            <h2><strong>Informações do Pedido</strong></h2>
            <div class="form-group">
                <strong>Nome do cliente:</strong><input type="text" class="form-control" disabled
                    value="{{($models_clientes->nome_razaosocial)}}">
            </div>
            <div class="form-group">
                <strong>Prazo de entrega:</strong><input type="text" class="form-control" disabled
                    value="{{ \Carbon\Carbon::parse($pedidos->data_entrega)->format('d/m/Y')}}">
            </div>
            <div class="form-group">
                <strong>Descrição:</strong><input type="text" class="form-control" disabled
                    value="{{($pedidos->descricao)}}">
            </div>
            <h5> <strong>Itens do pedido:</strong></h5>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <!-- z -->
                        <th scope="col">Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Tamanho(cm)</th>
                        <th scope="col">Valor do Produto</th>
                        @foreach ($itens_pedidos as $itens)
                    <tr>
                        <!-- <td>{{$itens->id}}</td> -->
                        <td>{{$itens->nome}}</td>
                        <td>{{$itens->quantidade}}</td>
                        <td>{{$itens->tamanho}}</td>
                        <td>{{number_format($itens->valor, 2, ',', '.')}}</td>
                    </tr>
                    @endforeach
                    </tr>
                </thead>
            </table>
            <table class="table table-dark table-striped">
                <tr>
                    <th>Valor Total</th>
                </tr>
                <tr>
                    <td>R$ {{number_format($pedidos->valor_total, 2, ',', '.')}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>


@endsection