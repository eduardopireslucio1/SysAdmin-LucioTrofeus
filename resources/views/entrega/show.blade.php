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
            <div class="div card">
                <div class="card-body">
                    <div class="row" style="margin-bottom:2vh">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col-3">ID - Nome do funcionário</th>
                                    <th class="col-3">ID Pedido - Nome do cliente</th>
                                    <th class="col-3">Data da entrega</th>
                                    <th class="col-3">Taxa de frete:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$pedido_cliente->id}} - {{$nome_funcionario}}</td>
                                    <td>{{$pedido->id}} - {{$nome_cliente}}</td>
                                    <td>{{ \Carbon\Carbon::parse($entrega->dt_entrega)->format('d/m/Y')}}</td>
                                    <td>{{$entrega->taxa_frete}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row" style="margin-bottom:2vh">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col-3">Taxa de frete:</th>
                                    <th class="col-3">Cidade:</th>
                                    <th class="col-3">Endereço:</th>
                                    <th class="col-3">Número:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>R$ {{number_format($entrega->taxa_frete, 2, ',', '.')}}</td>
                                    <td>{{$entrega->cidade}}</td>
                                    <td>{{$entrega->endereco}}</td>
                                    <td>{{$entrega->numero}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row" style="margin-bottom:2vh">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col-">Descrição:</th>
                                    <th class="col-">Status:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$entrega->descricao}}</td>
                                    @if($entrega->status == 0)
                                    <td><button class="btn btn-block btn-warning">Pendente</button></td>
                                    @elseif($entrega->status == 1)
                                    <td><button class="btn btn-block btn-primary">Em andamento</button></td>
                                    @elseif($entrega->status == 2)
                                    <td><button class="btn btn-block btn-danger">Cancelado</button></td>
                                    @else
                                    <td class="col-3"><button  class="btn btn-block btn-success">Concluído</button></td>
                                    @endif
                                </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

@endsection