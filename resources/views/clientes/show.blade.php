@extends('layouts.admin')
@section('title', $models_clientes->produtos)

@section('content')

<div class="col-md-10 offset-md-0.5">
        <div id="info-container" class="col-md-6">
            <h2><strong>Informações do Cliente</strong></h2>
            <h3>Dados pessoais</h3>
            <div class="form-group">
                <strong>CNPJ:</strong><input type="text" class="form-control" disabled value="{{($models_clientes->cnpj)}}">
            </div>

            <div class="form-group">
                <strong>CPF:</strong><input type="text" class="form-control" disabled value="{{($models_clientes->cpf)}}">
            </div>

            <div class="form-group">
                <strong>Nome / Razão Social:</strong><input type="text" class="form-control" disabled
                        value="{{($models_clientes->nome_razaosocial)}}">
            </div>

            <div class="form-group">
                <strong>Fantasia:</strong><input type="text" class="form-control" disabled
                        value="{{($models_clientes->fantasia)}}">
            </div>
            
            <div class="form-group">
                <strong>Telefone:</strong><input type="text" class="form-control" disabled
                        value="{{($models_clientes->telefone)}}">
            </div>
            
            <div class="form-group">
                <strong>CEP:</strong><input type="text" class="form-control" disabled
                        value="{{($models_clientes->cep)}}">
            </div>
            
            <div class="form-group">
                <strong>Estado:</strong><input type="text" class="form-control" disabled
                        value="{{($models_clientes->estado)}}">
            </div>
            
            <div class="form-group">
                <strong>Cidade:</strong><input type="text" class="form-control" disabled
                        value="{{($models_clientes->cidade)}}">
            </div>
            
            <div class="form-group">
                <strong>Logradouro:</strong><input type="text" class="form-control" disabled
                        value="{{($models_clientes->logradouro)}}">
            </div>
            
            <div class="form-group">
                <strong>Número:</strong><input type="text" class="form-control" disabled
                        value="{{($models_clientes->numero)}}">
            </div>
            
            <div class="form-group">
                <strong>E-mail:</strong><input type="text" class="form-control" disabled
                        value="{{($models_clientes->email)}}">
            </div>
            
            <div class="form-group">
                <strong>Observação:</strong><input type="text" class="form-control" disabled
                        value="{{($models_clientes->observacao)}}">
            </div>

    </div>
</div>


@endsection