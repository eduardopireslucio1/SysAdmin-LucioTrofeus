@extends('layouts.admin')
@section('title','Novo pedido')
<style>
#descricao {
    width: 100%;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/css/bootstrap-select.min.css"
    rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
<script src="/js/pedido/index.js"></script>

@section('content')

<div>
    <div class="container">
        <div class="row" style="margin-bottom:6vh">
            <div class="col-4">
                <select id="cliente" placeholder="Selecione um cliente" class="selectpicker" data-live-search="true"
                    style="width:100%">
                    <option data-valor="" value=""></option>
                    @foreach ($models_clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nome_razaosocial}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <textarea id="descricao" placeholder="Descrição"></textarea>
            </div>
            <div class="col-4">
                <input id="data" type="date" placeholde="Data entrega">
            </div>
        </div>
        <div class="row" style="margin-bottom:2vh">
            <div class="col-4">
                <select id="produto" placeholder="Selecione um produto" class="selectpicker" data-live-search="true"
                    style="width:100%">
                    <option data-valor="" value=""></option>
                    @foreach ($models_produtos as $produto)
                    <option data-valor="{{$produto->preco}}" value="{{$produto->id}}">{{$produto->nome}}</option>

                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <input id="quantidade" placeholder="Quantidade" type="number" />
            </div>
            <div class="col-3">
                <input id="tamanho" placeholder="Tamanho" type="number" />
            </div>
            <div class="col-2">
                <button onclick="addItem()" type="button">Adicionar</button>
            </div>
        </div>
    </div>
    <div id="grid_produto" class="container" style="margin-bottom:2vh">

    </div>

    <div>
        <button onclick="salvar()">Salvar</button>
    </div>
</div>

@endsection