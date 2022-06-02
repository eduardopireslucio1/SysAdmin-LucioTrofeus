@extends('layouts.admin')
@section('title','Relatorios')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/css/bootstrap-select.min.css"
    rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
<script src="/js/relatorios/index.js"></script>


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3><b>Relatórios</b></h3>
                </div>
            </div>
        </div>
        <div class="col-4">
            <h4>Faturamento por período:</h4>
            <label for="">Data inicial:</label>
            <input class="form-control datetimepicker-input" type="date" id="data_inicial">
            <label for="">Data final:</label>
            <input class="form-control datetimepicker-input" type="date" id="data_final">
            <button style="margin-top:10px" class="btn btn-primary" onclick="getTotalByPeriod()">Filtrar</button>
        </div>
        <div class="total">
            <label style="margin-right:5px" for="">Total R$:</label>
            <span class="" id="total"></span>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <h4>Clientes com mais pedidos:</h4>
            <div id="clientes">
            </div>
            <a href="{{route('pdf', ['opcao' => 'maispedidos'])}}" class="btn btn-primary"> PDF </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <h4>Produtos mais vendidos:</h4>
            <div id="produtos">
            </div>
            <a href="{{route('pdf', ['opcao' => 'produtosmaisvendidos'])}}" class="btn btn-primary"> PDF </a>
        </div>
    </div>


</div>

<style>
.total {
    border-left-width: 2px;
    border-left-style: solid;
    border-bottom-width: 2px;
    border-bottom-style: solid;
    border-right-width: 2px;
    border-right-style: solid;
    border-top-width: 2px;
    border-top-style: solid;
    height: 30px;
    border-radius: 0 30px 0 30px;
    width: 175px;
    text-align: center;
    font-size: 16px;
}
</style>


@endsection