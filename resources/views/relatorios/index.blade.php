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
    
    <div class="row">
        <div class="col-4">
        <input type="date" id="data_inicial">
        <input type="date" id="data_final">
        <button onclick="getTotalByPeriod()">Filtrar</button>
        </div>
        <div class="col-8" id="total">

        </div>
    </div>

    <div class="row">
        <div id="clientes" class="col-6">
            
        </div>

        <div id="produtos" class="col-6">
            
        </div>
    </div>

    

@endsection