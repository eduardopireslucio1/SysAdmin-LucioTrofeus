@extends('layouts.admin')
@section('title','Lista de entregas')

@section('content')
<div class="card">
    <div class="card-body">
        <h2><strong>Informações da Entrega</strong></h2>

        <div class="form-group">
            <strong>Pedido:</strong>
            <a href="/admin/pedido/{{$pedido[0]->id}}">{{$pedido[0]->id}} - {{ $cliente[0]->nome_razaosocial}}</a>
        </div>

        <div class="row" style="margin-bottom:2vh">
            <div class="col-4">
                <form action="/admin/entrega/{{$entregas->id}}" method="POST" enctype="multipart/form-data">
                    <strong>Nome do funcionário responsável:</strong>
                    <select class="form-control select2bs4 select2-hidden-accessible" id="models_funcionario_id"
                        style="margin-bottom:2vh" name="models_funcionario_id" placeholder="Selecione um funcionário"
                        class="selectpicker" data-live-search="true" style="width:100%">
                        <option data-valor="{{$funcionario->nome}}" value="{{$funcionario->nome}}">
                            {{$funcionario->nome}}</option>
                        @foreach ($models_funcionarios as $funcionario)
                        <option value="{{$funcionario->id}}">{{$funcionario->nome}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="col-4">
                <label for="">Data da entrega:</label>
                <input class="form-control datetimepicker-input" id="dt_entrega" name="dt_entrega" type="date"
                    placeholder="Data entrega" value="{{($entregas->dt_entrega)}}">
            </div>

            <div class="col-4">
                <label>Taxa de frete: </label>
                <input placeholder="Taxa de frete" type="text" name="taxa_frete"
                    class="form-control @error('taxa_frete') is-invalid @enderror" id="taxa_frete"
                    value="{{$entregas->taxa_frete}}">{{old('taxa_frete')}}</input>
                @error('taxa_frete')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row" style="margin-bottom:2vh">
            <div class="col-4">
                <label>Cidade: </label>
                <input placeholder="Cidade" type="text" name="cidade"
                    class="form-control @error('cidade') is-invalid @enderror" id="cidade"
                    value="{{$entregas->cidade}}">{{old('cidade')}}</input>
                @error('cidade')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-4">
                <label>Endereço: </label>
                <input placeholder="Endereço" type="text" name="endereco"
                    class="form-control @error('endereco') is-invalid @enderror" id="endereco"
                    value="{{$entregas->endereco}}">{{old('cidade')}}</input>
                @error('endereco')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-1">
                <label>Número: </label>
                <input placeholder="Número" type="text" name="numero"
                    class="form-control @error('numero') is-invalid @enderror" id="numero"
                    value="{{$entregas->numero}}">{{old('numero')}}</input>
                @error('numero')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row" style="margin-bottom:2vh">
            <div class="col-4">
                <label>Descrição: </label>
                <textarea placeholder="Descrição" type="text" name="descricao" style="resize: none" rows="5"
                    class="form-control @error('descricao') is-invalid @enderror" id="descricao">{{$entregas->descricao}}
                        </textarea>
                @error('descricao')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-4">
                <label>Status: </label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="0" {{$entregas->status == 0 ? "selected='selected'" : ""}}>Pendente
                    </option>
                    <option value="1" {{$entregas->status == 1 ? "selected='selected'" : ""}}>Em andamento
                    </option>
                    <option value="2" {{$entregas->status == 2 ? "selected='selected'" : ""}}>Cancelado
                    </option>
                    <option value="3" {{$entregas->status == 3 ? "selected='selected'" : ""}}>Concluído
                    </option>
                </select>
                @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <input class="btn btn-primary" type="submit" value="Editar Entrega">

        </form>
    </div>
</div>
</div>
<style>
input[type=checkbox] {
    cursor: pointer;
    width: 22px;
}
</style>

@endsection