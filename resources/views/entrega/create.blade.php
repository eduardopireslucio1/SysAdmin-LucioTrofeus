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
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Nova Entrega</h3><br>
                </div>

                <form action="{{route('entrega.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <select class="custom-select form-control-border border-width-2" id="models_funcionario_id" name="models_funcionario_id"
                            placeholder="Selecione um funcionário" class="selectpicker" data-live-search="true"
                            style="width:100%">
                            <option data-valor="" value=""></option>
                            @foreach ($models_funcionarios as $funcionario)
                            <option value="{{$funcionario->id}}">{{$funcionario->nome}}</option>
                            @endforeach
                        </select>

                        <select class="custom-select form-control-border border-width-2" id="pedido_id" name="pedido_id"
                            placeholder="Selecione o pedido" class="selectpicker" data-live-search="true"
                            style="width:100%">
                            <option data-valor="" value=""></option>
                            @foreach ($pedidos as $pedido)
                            <option value="{{$pedido->id}}">{{$pedido->models_cliente_id}}</option>
                            @endforeach
                        </select>

                </div>
                <div class="col-4">
                    <br><label for="">Data da entrega:</label>
                    <br><input class="form-control datetimepicker-input" id="dt_entrega" name="dt_entrega" type="date"
                        placeholder="Data entrega">
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
                    <label>Custo: <span class="obrigatorio">*</span></label>
                    <input placeholder="Custo" type="text" name="custo"
                        class="form-control @error('custo') is-invalid @enderror" id="custo">{{old('custo')}}</input>
                    @error('custo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Endereço: <span class="obrigatorio">*</span></label>
                    <input placeholder="Endereço" type="text" name="endereco"
                        class="form-control @error('endereco') is-invalid @enderror"
                        id="endereco">{{old('endereco')}}</input>
                    @error('endereco')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-8">
                    <br> <br> <textarea style="resize: none" rows="5" class="form-control" name="descricao" id="descricao"
                        placeholder="Descrição"></textarea>
                </div>


                    <button class="btn btn-success" type="submit">Salvar</button>

            </form>

            <!-- <div>
                        <button class="btn btn-success" onclick="salvar()">Salvar</button>
                    </div> -->
        </div>
    </div>
</div>
</div>
<div id="grid_produto" class="container" style="margin-bottom:2vh">

</div>




@endsection