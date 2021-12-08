@extends('layouts.admin')
@section('title','Lista de pedidos')

<style> 
    p{margin-top: 10px !important;}
    p{margin-left: 20px;}

   form{
       display: inline-block;
   }

</style>

@section('content')
<div class="col-md-11">
    <div class="painel panel-default">
        <div class="painel-heading" style="margin-top:8px !important;color: black">
            <h3><b>Pedidos</b>
    
            </h3>
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
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{$pedido->id}}</td>
                    <td>{{$pedido->models_cliente_id}}</td>
                    <td>{{$pedido->data_entrega}}</td>
                    <td>{{$pedido->valor_total}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
       
    </div>
</div>

@endsection