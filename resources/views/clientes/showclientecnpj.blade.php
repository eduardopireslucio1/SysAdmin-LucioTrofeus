@extends('layouts.admin')
@section('title', $models_clientes->nome)

@section('content')

<div class="container-fluid">
    <div style="padding:0px;" class="col-md-12">
        <div class="painel panel-default">
            <div class="painel-heading" style="margin-top:8px !important;color: black">
                <div class="card card-info">
                    <div class="card-header">
                        <h2><strong>Informações do Cliente</strong></h2>
                        </h3>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="margin-bottom:2vh">

                            <div class="col-4">
                                <strong>CNPJ</strong><input type="text" class="form-control" disabled
                                    value="{{($models_clientes->cnpj)}}">
                            </div>

                            <div class="col-4">
                                <strong>Razao social</strong><input type="text" class="form-control" disabled
                                    value="{{($models_clientes->nome_razaosocial)}}">
                            </div>

                            <div class="col-3">
                                <strong>Fantasia</strong><input type="text" class="form-control" disabled
                                    value="{{($models_clientes->fantasia)}}">
                            </div>

                            <div class="col-1">
                                <strong>Tipo</strong><input type="text" class="form-control" disabled
                                    value="{{($models_clientes->inTipo)}}">
                            </div>
                        </div>

                        <div class="row" style="margin-bottom:2vh">

                            <div class="col-4">
                                <strong>Telefone</strong><input type="text" class="form-control" disabled
                                    value="{{($models_clientes->telefone)}}">
                            </div>

                            <div class="col-4">
                                <strong>CEP</strong><input type="text" class="form-control" disabled
                                    value="{{($models_clientes->cep)}}">
                            </div>

                            <div class="col-2">
                                <strong>Cidade</strong><input type="text" class="form-control" disabled
                                    value="{{($models_clientes->cidade)}}">
                            </div>

                            <div class="col-2">
                                <strong>Estado</strong><input type="text" class="form-control" disabled
                                    value="{{($models_clientes->uf)}}">
                            </div>

                        </div>

                        <div class="row" style="margin-bottom:2vh">

                            <div class="col-3">
                                <strong>Logradouro</strong><input type="text" class="form-control" disabled
                                    value="{{($models_clientes->logradouro)}}">
                            </div>
                            <div class="col-1">
                                <strong>Número</strong><input type="text" class="form-control" disabled
                                    value="{{($models_clientes->numero)}}">
                            </div>

                            <div class="col-4">
                                <strong>E-mail</strong><input type="text" class="form-control" disabled
                                    value="{{($models_clientes->email)}}">
                            </div>

                            <div class="col-4">
                                <strong>Observação</strong><input type="text" class="form-control" disabled
                                    value="{{($models_clientes->observacao)}}">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection