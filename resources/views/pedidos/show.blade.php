@extends('layouts.admin')
@section('title','Lista de pedidos')

@section('content')
<div class="container-fluid">
    <div style="padding:0px;" class="col-md-12">
        <div class="painel panel-default">
            <div class="painel-heading" style="margin-top:8px !important;color: black">
                <div class="card card-info">
                    <div class="card-header">
                        <h3><strong>Informações do Pedido</strong></h3>
                    </div>
                </div>
                <div class="row" style="margin-bottom:2vh">
                    <div class="col-6">
                        <strong>Nome do cliente:</strong><input type="text" class="form-control" disabled
                            value="{{($models_clientes->nome_razaosocial)}}">
                    </div>
                    <div class="col-6">
                        <strong>Prazo de entrega:</strong><input type="text" class="form-control" disabled
                            value="{{ \Carbon\Carbon::parse($pedidos->data_entrega)->format('d/m/Y')}}">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom:2vh">
                <div class="col-6">
                    <strong>Descrição:</strong><input type="text" class="form-control" disabled
                        value="{{($pedidos->descricao)}}">
                </div>

                <div class="col-3">
                    <strong>Status:</strong>
                    @if($pedidos->status == 0)
                    <td><button class="btn btn-block btn-warning">Pendente</button></td>
                    @elseif($pedidos->status == 1)
                    <td><button class="btn btn-block btn-primary">Em andamento</button></td>
                    @elseif($pedidos->status == 2)
                    <td><button class="btn btn-block btn-danger">Cancelado</button></td>
                    @else
                    <td><button class="btn btn-block btn-success">Concluído</button></td>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h5> <strong>Itens do pedido:</strong></h5>
                        </div>
                    </div>
                </div>
            </div>
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
</div>
</div>
</div>


@endsection