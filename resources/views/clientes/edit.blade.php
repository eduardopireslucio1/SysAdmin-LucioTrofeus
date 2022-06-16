@extends('layouts.admin')
@section('title','Edição de Clientes')
@section('content')
<div class="container-fluid">
    <div class="padding:0px;" class="col-md-12">
        <div class="painel-heading" style="margin-top:8px !important;color: black">
            <div class="card card-info">
                <div class="card-header">
                    <h3><strong>Edição do cliente: </strong></h3>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="/admin/clientes/{{$models_clientes->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row" style="margin-bottom:6vh">
                            <div class="col-3">
                                <label>CNPJ:</label>
                                <input placeholder="CNPJ" type="text" name="cnpj"
                                    class="form-control @error('cnpj') is-invalid @enderror" id="cnpj"
                                    value="{{$models_clientes->cnpj}}">
                                @error('cnpj')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label>CPF: </label>
                                <input placeholder="CPF" type="text" name="cpf"
                                    class="form-control @error('cpf') is-invalid @enderror" id="cpf"
                                    value="{{$models_clientes->cpf}}">
                                @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label>Nome / Razão Social: </label>
                                <input placeholder="Nome / Razão Social" type="text" name="nome_razaosocial"
                                    class="form-control @error('nome_razaosocial') is-invalid @enderror"
                                    id="nome_razaocial" value="{{$models_clientes->nome_razaosocial}}">
                                @error('nome_razaosocial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label>Fantasia: </label>
                                <input placeholder="Fantasia" type="text" name="fantasia"
                                    class="form-control @error('fantasia') is-invalid @enderror" id="fantasia"
                                    value="{{$models_clientes->fantasia}}">
                                @error('fantasia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row" style="margin-bottom:6vh">
                            <div class="col-3">
                                <label>Telefone: </label>
                                <input placeholder="Telefone" type="text" name="telefone"
                                    class="form-control @error('telefone') is-invalid @enderror" id="telefone"
                                    value="{{$models_clientes->telefone}}">
                                @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label>CEP: </label>
                                <input placeholder="CEP" type="text" name="cep"
                                    class="form-control @error('cep') is-invalid @enderror" id="cep"
                                    value="{{$models_clientes->cep}}">
                                @error('cep')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label>Estado: </label>
                                <input placeholder="UF" type="text" name="uf"
                                    class="form-control @error('uf') is-invalid @enderror" id="uf"
                                    value="{{$models_clientes->uf}}">
                                @error('uf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label>Cidade: </label>
                                <input placeholder="Cidade" type="text" name="cidade"
                                    class="form-control @error('cidade') is-invalid @enderror" id="cidade"
                                    value="{{$models_clientes->cidade}}">
                                @error('cidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row" style="margin-bottom:6vh">
                            <div class="col-3">
                                <label>Logradouro: </label>
                                <input placeholder="Logradouro" type="text" name="logradouro"
                                    class="form-control @error('logradouro') is-invalid @enderror" id="logradouro"
                                    value="{{$models_clientes->logradouro}}">
                                @error('logradouro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label>Número: </label>
                                <input placeholder="Número" type="text" name="numero"
                                    class="form-control @error('numero') is-invalid @enderror" id="numero"
                                    value="{{$models_clientes->numero}}">
                                @error('numero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label>Email: </label>
                                <input placeholder="Email" type="text" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    value="{{$models_clientes->email}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label>Observação: </label>
                                <input placeholder="Observação" type="text" name="observacao"
                                    class="form-control @error('observacao') is-invalid @enderror" id="observacao"
                                    value="{{$models_clientes->observacao}}">
                                @error('observacao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <input class="btn btn-primary" type="submit" value="Editar Cliente">

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
    </div>
</div>
@endsection