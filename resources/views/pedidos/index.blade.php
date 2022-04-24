@extends('layouts.admin')
@section('title','Lista de pedidos')

<style>
p {
    margin-top: 10px !important;
}

p {
    margin-left: 20px;
}

form {
    display: inline-block;
}
</style>

@section('content')
<div class="container-fluid">
    <div style="padding:0px" class="col-md-12">
        <div class="painel panel-default">
            <div class="painel-heading" style="margin-top:8px !important;color: black">
                <div class="card card-success">
                    <div class="card-header">
                        <h3><b>Pedidos</b>

                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="text" style="color: #007FFF"><strong>Lista de pedidos:</strong>
    <div class="div card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Cliente</th>
                        <th>Data de entrega</th>
                        <th>Valor total</th>
                        <th>Informações</th>
                        <th>Editar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{$pedido->id}}</td>
                        <td>{{$pedido->nome_razaosocial}}</td>
                        <td>{{ \Carbon\Carbon::parse($pedido->data_entrega)->format('d/m/Y')}}</td>
                        <td>R$ {{number_format($pedido->valor_total, 2, ',', '.')}}</td>
                        <td><a href="/admin/pedido/{{$pedido->id}}" class="btn btn-info"><i class="fas fa-eye"
                                    style="color:white"></i></a></td>
                        <td><a href="/admin/pedido/edit/{{$pedido->id}}" class="btn btn-primary"><i
                                    class="fas fa-edit"></i></a></td>
                        @if($pedido->status == 0)
                        <td><button class="btn btn-block btn-warning">Pendente</button></td>
                        @elseif($pedido->status == 1)
                        <td><button class="btn btn-block btn-primary">Em andamento</button></td>
                        @elseif($pedido->status == 2)
                        <td><button class="btn btn-block btn-danger">Cancelado</button></td>
                        @elseif($pedido->status == 3)
                        <td><button class="btn btn-block btn-success">Concluído</button></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>


@endsection