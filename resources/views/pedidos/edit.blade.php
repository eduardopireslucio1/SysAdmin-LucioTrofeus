@extends('layouts.admin')
@section('title','Lista de pedidos')

@section('content')
<div class="container-fluid">
    <div class="padding:0px;" class="col-md-12">
        <div class="painel-heading" style="margin-top:8px !important;color: black">
            <div class="card card-info">
                <div class="card-header">
                    <h3><strong>Edição do pedido</strong></h3>
                </div>
            </div>
            <div class="form-group">
                <strong>Nome do cliente:</strong><input type="text" class="form-control" disabled
                    value="{{($models_clientes->nome_razaosocial)}}">
            </div>
            <div class="form-group">
                <strong>Prazo de entrega:</strong><input type="text" class="form-control" disabled
                    value="{{ \Carbon\Carbon::parse($pedidos->data_entrega)->format('d/m/Y')}}">
            </div>

            <div class="form-group">
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
                <form action="/admin/pedidos/{{$pedidos->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">

                        <label>Descrição: </label>
                        <textarea placeholder="Descrição" type="text" name="descricao" style="resize: none" rows="5"
                            class="form-control @error('descricao') is-invalid @enderror" id="descricao">{{$pedidos->descricao}}
                        </textarea>
                        @error('descricao')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label>Status: </label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="0" {{$pedidos->status == 0 ? "selected='selected'" : ""}}>Pendente
                            </option>
                            <option value="1" {{$pedidos->status == 1 ? "selected='selected'" : ""}}>Em andamento
                            </option>
                            <option value="2" {{$pedidos->status == 2 ? "selected='selected'" : ""}}>Cancelado
                            </option>
                            <option value="3" {{$pedidos->status == 3 ? "selected='selected'" : ""}}>Concluído
                            </option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="">
                            <label>Enviar imagem do cartaz: </label>
                            <div class="custom-file">
                                <input type="file" id="imagem_cartaz" class="custom-file-input" name="imagem_cartaz" value="">
                                <label for="imagem_cartaz" class="custom-file-label">Enviar imagem cartaz </label>
                            </div>
                            @error('imagem_cartaz')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="">
                            <label>Enviar arquivo corel: </label>
                            <div class="custom-file">
                                <input type="file" id="corel" class="custom-file-input" name="corel" value="">
                                <label for="corel" class="custom-file-label">Enviar corel </label>
                            </div>
                            @error('corel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Editar Pedido">
                    <style>
                    input[type=checkbox] {
                        cursor: pointer;
                        width: 22px;
                    }
                    </style>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection