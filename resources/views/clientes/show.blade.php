@extends('layouts.admin')
@section('title', $models_clientes->produtos)

@section('content')

<div class="col-md-10 offset-md-0.5">
    <div class="row">
        <div id="info-container" class="col-md-6">
            <h2><strong>Informações do Cliente</strong></h2>
            <h3>Dados pessoais</h3>
            <p> <strong>Nome / Razão Social:</strong>  {{ucwords($models_clientes->nome_razaosocial)}}</p>
            <p><strong>Email: </strong> {{$models_clientes->email}}</p>
            <p><strong>Telefone:</strong>{{$models_clientes->telefone}}</p>
            <p><strong>CNPJ: </strong>{{$models_clientes->cnpj}}</p>
            <p><strong>CEP: </strong>{{$models_clientes->cep}}</p>
            <p><strong>Cidade: </strong>{{$models_clientes->cidade}}</p>
            <p><strong>Estado: </strong>{{$models_clientes->uf}}</p>
            <p><strong>Rua: </strong>{{$models_clientes->rua}}</p>
            <p><strong>Número: </strong>{{$models_clientes->numero}}</p>
            <p><strong>Observação: </strong>{{$models_clientes->observacao}}</p>

    </div>
  </div>
 </div>

@endsection