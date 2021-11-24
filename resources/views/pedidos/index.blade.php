@extends('layouts.admin')
@section('title','Novo pedido')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/css/bootstrap-select.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
<script src="/js/pedido/index.js"></script>

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <select id="produto" placeholder="Selecione um produto" class="selectpicker" data-live-search="true" style="width:100%">
                @foreach ($models_produtos as $produto)
                    <option data-valor="{{$produto->preco}}" value="{{$produto->id}}">{{$produto->nome}}</option>

                @endforeach
                </select>
            </div>
            <div class="col-4">
                <input id="quantidade" placeholder="Quantidade" type="number" />
            </div>
            <div class="col-2">
                <button onclick="addItem()" type="button">Adicionar</button>
            </div>
        </div>
    </div>
    <div id="grid_produto" class="container">

    </div>
</div>

@endsection