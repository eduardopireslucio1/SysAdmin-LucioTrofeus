@extends('layouts.admin')
@section('title','Lista de pedidos')

@section('content')
<div class="col-md-10 offset-md-0.5">
    <div class="row">
        <div id="info-container" class="col-md-6">
            <h2><strong>Informações do Pedido</strong></h2>
            <p> <strong>Nome do cliente:</strong> {{$pedidos->nome_razaosocial}}</p>
            <p> <strong>Prazo de entrega:</strong> {{$pedidos->data_entrega}}</p>
            <p> <strong>Descrição:</strong> {{$pedidos->descricao}}</p>
            <p> <strong>Itens do pedido:</strong></p>
            <table>
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Tamanho(cm)</th>
                        <th scope="col">Valor do Produto</th>
                        @foreach ($itens_pedidos as $itens)
                    <tr>
                        <td>{{$itens->id}}</td>
                        <td>{{$itens->models_produto_id}}</td>
                        <td>{{$itens->quantidade}}</td>
                        <td>{{$itens->tamanho}}</td>
                        <td>{{$itens->valor}}</td>
                    </tr>
                    @endforeach
                    </tr>
                    <tr>
                        <th>Valor Total</th>
                    </tr>
                    <tr>
                        <td>{{$pedidos->valor_total}}</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


@endsection