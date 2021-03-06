@extends('layouts.admin')
@section('title','Show de pedidos')

@section('content')
<div class="container-fluid">
    <div style="padding:0px;" class="col-md-12">
        <div class="painel panel-default">
            <div class="card card-info">
                <div class="card-header">
                    <h3><strong>Informações do Pedido: {{$pedidos->id}}</strong></h3>
                </div>
            </div>
            <div class="div card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome do cliente:</th>
                                <th>Prazo de entrega:</th>
                                <th>Descrição:</th>
                                <th>Status:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a
                                        href="/admin/clientes/{{$models_clientes->id}}">{{$models_clientes->id}} - {{$models_clientes->nome_razaosocial}}</a>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($pedidos->data_entrega)->format('d/m/Y')}}</td>
                                <td>{{$pedidos->descricao}}</td>
                                @if($pedidos->status == 0)
                                <td><button class="btn btn-block btn-warning">Pendente</button></td>
                                @elseif($pedidos->status == 1)
                                <td><button class="btn btn-block btn-primary">Em andamento</button></td>
                                @elseif($pedidos->status == 2)
                                <td><button class="btn btn-block btn-danger">Cancelado</button></td>
                                @else
                                <td><button class="btn btn-block btn-success">Concluído</button></td>
                                @endif
                            </tr>
                        </tbody>
                    </table>

                    <div class="row" style="margin-bottom:2vh">
                        <div class="col-3">
                            <div>
                                <h4>Itens do pedido:</h5>
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
                    </table><br>
                    <table class="table table-dark table-striped">
                        <tr>
                            <th scope="col">Valor Total</th>
                        </tr>
                        <tr>
                            <td>R$ {{number_format($pedidos->valor_total, 2, ',', '.')}}</td>
                        </tr>
                    </table><br>
                    @if(isset($pedidos->imagem_cartaz))
                    <div class="row" style="margin-bottom:2vh">
                        <div class="col-3">
                            <div>
                                <h4>Imagem do cartaz:</h5>
                            </div>
                        </div>
                    </div>
                    <div id="image-container" class="col-3">
                        <img src="/images/pedidos/{{$pedidos->imagem_cartaz}}" class="img-fluid" alt="" width="500">
                    </div><br>
                    @endif
                    @if(isset($pedidos->corel))
                    <a id="btn-corel" href="{{ url('/corel/'. $pedidos->corel)  }}" target="_blank">
                        <button class="btn"><i class="fa fa-download"></i> Download arquivo corel</button>
                    </a>
                    @endif
                </div>


            </div>
        </div>
    </div>
</div>
</div>



@endsection