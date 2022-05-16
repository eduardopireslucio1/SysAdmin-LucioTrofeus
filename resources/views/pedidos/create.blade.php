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


<div class="container-fluid">
    <div class="row" style="margin-bottom:6vh">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Novo Pedido</h3><br>
                </div>
            </div>


            <div class="row" style="margin-bottom:2vh">
            <div class="col-3">
                    <label for="">Cliente</label>
                    <select class="form-control select2bs4 select2-hidden-accessible" id="cliente"
                    placeholder="Selecione um cliente" class="selectpicker" data-live-search="true" style="width:100%">
                    <option data-valor="" value=""></option>
                    @foreach ($models_clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nome_razaosocial}}</option>
                    @endforeach
                </select>
                </div>
                <div class="col-3">
                    <label for="">Produto</label>
                    <select class="form-control select2bs4 select2-hidden-accessible" id="produto" placeholder="Selecione um produto"
                        class="selectpicker" data-live-search="true" style="width:100%; outline: none">
                        <option data-valor="" value=""></option>
                        @foreach ($models_produtos as $produto)
                        <option data-valor="{{$produto->preco}}" value="{{$produto->id}}">{{$produto->nome}}
                        </option>

                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <label for="">Quantidade</label>
                    <input class="form-control" id="quantidade" placeholder="Ex: 20" type="number" />
                </div>
                <div class="col-3">
                    <label for="">Tamanho</label>
                    <input class="form-control" id="tamanho" placeholder="Ex: 15cm" type="number" />
                </div>

                <br>

                <div class="col-8">
                    <br> <br> <textarea style="resize: none" rows="5" class="form-control" id="descricao"
                        placeholder="Descrição"></textarea>
                </div>
                <div class="col-4">
                    <br><label for="">Prazo de entrega:</label>
                    <br><input class="form-control datetimepicker-input" id="data" type="date"
                        placeholde="Data entrega">
                        <label style="padding:5 px;">Status: <span class="obrigatorio"></span></label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="0" {{old('status'==0 ? 'selected' : '')}}>Pendente</option>
                        <option value="1" {{old('status'==1 ? 'selected' : '')}}>Em andamento</option>
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    
                </div>

                <div class="col-4">
                    <br> <button class="btn btn-primary" onclick="addItem()" type="button">Adicionar</button>
                </div>

                <!-- <div>
                        <button class="btn btn-success" onclick="salvar()">Salvar</button>
                    </div> -->
            </div>
        </div>
    </div>
</div>
<div id="grid_produto" class="container" style="margin-bottom:2vh">

</div>

</div>


@endsection