@extends('layouts.admin')
@section('title','Nova entrega')
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
<script src="/js/entrega/entrega.js"></script>

@section('content')


<div class="container-fluid">
    <div class="row" style="margin-bottom:6vh">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Nova Entrega</h3><br>
                </div>
            </div>

            <form action="{{route('entrega.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row" style="margin-bottom:2vh">
                    <div class="col-3">
                        <label for="">Funcionário</label>
                        <select class="form-control select2bs4 select2-hidden-accessible" id="models_funcionario_id" name="models_funcionario_id"
                            placeholder="Selecione um funcionário" class="selectpicker" data-live-search="true"
                            style="width:100%">
                            <option data-valor="" value=""></option>
                            @foreach ($models_funcionarios as $funcionario)
                            <option value="{{$funcionario->id}}">{{$funcionario->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="">Pedido</label>
                        <select class="form-control select2bs4 select2-hidden-accessible" id="pedido_id" name="pedido_id"
                            placeholder="Selecione um pedido" class="selectpicker" data-live-search="true"
                            style="width:100%; outline: none">
                            <option data-valor="" value=""></option>
                            @foreach ($pedidos as $pedido)
                            <option value="{{$pedido->id}}">{{$pedido->models_cliente_id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="">Data da entrega:</label>
                        <input class="form-control datetimepicker-input" id="dt_entrega" name="dt_entrega" type="date"
                            placeholder="Data entrega">
                    </div>
                    <div class="col-3">
                        <label for="">Status:</label>
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
                </div>

                <div class="row" style="margin-bottom:2vh">
                    <div class="col-3">
                        <label>Taxa de frete: </label>
                        <input placeholder="Taxa de frete" type="text" name="taxa_frete"
                            class="form-control @error('taxa_frete') is-invalid @enderror"
                            id="taxa_frete">{{old('taxa_frete')}}</input>
                        @error('taxa_frete')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label>Cidade:</label>
                        <input placeholder="Cidade" type="text" name="cidade"
                            class="form-control @error('cidade') is-invalid @enderror"
                            id="cidade">{{old('cidade')}}</input>
                        @error('cidade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label>Endereço:</label>
                        <input placeholder="Endereço" type="text" name="endereco"
                            class="form-control @error('endereco') is-invalid @enderror"
                            id="endereco">{{old('endereco')}}</input>
                        @error('endereco')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label>Número:</label>
                        <input placeholder="Número" type="text" name="numero"
                            class="form-control @error('numero') is-invalid @enderror"
                            id="numero">{{old('numero')}}</input>
                        @error('numero')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <br><textarea style="resize: none" rows="5" class="form-control" id="descricao" name="descricao"
                            placeholder="Descrição"></textarea>
                    </div>
                </div>
        </div>

        <div class="col-4">
            <button class="btn btn-success" type="submit">Salvar</button>
        </div>
        </form>
    </div>
</div>



@endsection