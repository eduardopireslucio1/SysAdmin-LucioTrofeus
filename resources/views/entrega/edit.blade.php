@extends('layouts.admin')
@section('title','Lista de entregas')

@section('content')
<div class="col-md-10 offset-md-0.5">
    <div class="row">
        <div id="info-container" class="col-md-6">
            <h2><strong>Informações da Entrega</strong></h2>
            <div class="form-group">
                <strong>Nome do funcionário responsável:</strong>
                <select class="form-control select2bs4 select2-hidden-accessible" id="models_funcionario_id"
                    name="models_funcionario_id" placeholder="Selecione um funcionário" class="selectpicker"
                    data-live-search="true" style="width:100%">
                    <option data-valor="{{$funcionario->nome}}" value="{{$funcionario->nome}}"></option>
                    @foreach ($models_funcionarios as $funcionario)
                    <option value="{{$funcionario->id}}">{{$funcionario->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Data da entrega:</label>
                <input class="form-control datetimepicker-input" id="dt_entrega" name="dt_entrega" type="date"
                    placeholder="Data entrega" value="{{($entregas->dt_entrega)}}">
            </div>

            <div class="form-group">
                <label>Taxa de frete: </label>
                <input placeholder="Taxa de frete" type="text" name="taxa_frete"
                    class="form-control @error('taxa_frete') is-invalid @enderror"
                    id="taxa_frete" value="{{$entregas->taxa_frete}}">{{old('taxa_frete')}}</input>
                @error('taxa_frete')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            
            <div class="row" style="margin-bottom:2vh">
                <div class="col-3">
                <label>Cidade: </label>
                <input placeholder="Cidade" type="text" name="cidade"
                    class="form-control @error('cidade') is-invalid @enderror"
                    id="cidade" value="{{$entregas->cidade}}">{{old('cidade')}}</input>
                @error('cidade')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                <div class="col-6">
                <label>Endereço: </label>
                <input placeholder="Endereço" type="text" name="endereco"
                    class="form-control @error('endereco') is-invalid @enderror"
                    id="endereco" value="{{$entregas->endereco}}">{{old('cidade')}}</input>
                @error('endereco')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                <div class="col-3">
                <label>Número: </label>
                <input placeholder="Número" type="text" name="numero"
                    class="form-control @error('numero') is-invalid @enderror"
                    id="numero" value="{{$entregas->numero}}">{{old('numero')}}</input>
                @error('numero')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
            </div>

            <label>Descrição: </label>
            <textarea placeholder="Descrição" type="text" name="descricao" style="resize: none" rows="5"
                class="form-control @error('descricao') is-invalid @enderror" id="descricao">{{$entregas->descricao}}
                        </textarea>
            @error('descricao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="form-group">
                <strong>Pedido:</strong><input type="text" class="form-control" disabled
                    value="{{$pedido_cliente}}">
            </div>








            <input class="btn btn-primary" type="submit" value="Editar Entrega">
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


@endsection