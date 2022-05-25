@extends('layouts.admin')
@section('title','Show de entregas')

@section('content')
<div class="container-fluid">
    <div class="padding:0px;" class="col-md-12">
        <div class="painel-heading" style="margin-top:8px !important;color: black">
            <div class="card card-info">
                <div class="card-header">
                <h3><strong>Informações da Entrega</strong></h3>
                </div>
            </div>
            <div class="row" style="margin-bottom:2vh">
                    <div class="col-6">
                       <p>Pedido: {{$pedido->id}} - {{$nome_cliente}}</p>
                    </div>
                    
                </div>
        </div>
    </div>
</div>

@endsection