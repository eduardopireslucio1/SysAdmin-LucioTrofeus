@extends('layouts.admin')
@section('title','Nova entrega')
<style>
#descricao {
    width: 100%;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/css/bootstrap-select.min.css"
    rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
<script src="/js/entrega/entrega.js"></script>
<script src="/js/integracao/integracao.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

@section('content')


<div class="container-fluid">
    <div class="row" style="margin-bottom:6vh">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Nova Entrega</h3><br>
                </div>
            </div>

            <div class="div card">
                <div class="card-body">

                    <form action="{{route('entrega.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="margin-bottom:2vh">
                            <div class="col-3">
                                <label for="">Funcionário</label>
                                <select class="form-control select2bs4 select2-hidden-accessible"
                                    id="models_funcionario_id" name="models_funcionario_id"
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
                                <select class="form-control select2bs4 select2-hidden-accessible" id="pedido_id"
                                    name="pedido_id" placeholder="Selecione um pedido" class="selectpicker"
                                    data-live-search="true" style="width:100%; outline: none">
                                    <option data-valor="" value=""></option>
                                    @php $tamanho = count($pedidoInEntrega); @endphp
                                    @foreach ($pedidos as $pedido)
                                        @for($i = 0; $i < $tamanho; $i++)
                                            @if(!($pedidoInEntrega[$i]->id == $pedido->id))
                                                @if($pedido->status == 3)
                                                <option value="{{$pedido->id}}">{{$pedido->id}} - {{$pedido->nome_razaosocial}}
                                                </option>
                                                @endif
                                            @endif
                                        @endfor
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">Data da entrega:</label>
                                <input class="form-control datetimepicker-input" id="dt_entrega" name="dt_entrega"
                                    type="date" placeholder="Data entrega">
                            </div>
                            <div class="col-3">
                                <label for="">Status:</label>
                                <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror">
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
                                <label>CEP:</label>
                                <input placeholder="CEP" type="text" name="cep" onblur="checkCep(this.value)"
                                    autocomplete="off" class="form-control @error('cep') is-invalid @enderror"
                                    id="cep">{{old('cep')}}</input>
                                @error('cep')
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
                            <div class="col-2">
                                <label>Estado:</label>
                                <input placeholder="Estado" type="text" name="estado"
                                    class="form-control @error('estado') is-invalid @enderror"
                                    id="estado">{{old('estado')}}</input>
                                @error('estado')
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
                            <div class="col-1">
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
                        </div>
                        <div class="row" style="margin-bottom:2vh">
                            <div class="col-3">
                                <label>Tipo de frete:</label>
                                <select class="form-control select2bs4 select2-hidden-accessible" id="tipo_frete"
                                    name="tipo_frete" placeholder="Selecione um tipo de frete" class="selectpicker"
                                    data-live-search="true" style="width:100%">
                                    <option data-valor="" value=""></option>
                                    <option value="PAC">PAC</option>
                                    <option value="SEDEX">SEDEX</option>
                                    <option value="SEDEX">Entrega pessoalmente</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label>Código de rastreio:</label>
                                <input placeholder="Código de rastreio" type="text" name="cod_rastreio"
                                    class="form-control @error('cod_rastreio') is-invalid @enderror"
                                    id="cod_rastreio">{{old('cod_rastreio')}}</input>
                                @error('cod_rastreio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-2">
                                <label>Taxa de frete: </label>
                                <input placeholder="R$" type="text" name="taxa_frete"
                                    class="form-control @error('taxa_frete') is-invalid @enderror"
                                    id="taxa_frete">{{old('taxa_frete')}}</input>
                                @error('taxa_frete')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:2vh">
                            <div class="col-6">
                                <label>Descrição: </label>
                                <br><textarea style="resize: none" rows="5" class="form-control" id="descricao"
                                    name="descricao" placeholder="Descrição"></textarea>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:2vh">
                            <div class="col-4">
                                <button class="btn btn-success" type="submit">Salvar</button>
                            </div>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
var cleave = new Cleave('#cep', {
    delimiters: ['-'],
    blocks: [5, 3],
    numericOnly: true
});
</script>

@endsection