@extends('layouts.admin')
@section('title','Cadastrar Produtos')
@section('content-header','Cadastrar Cliente')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('clientes.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nome / Razão Social: </label>
                <input placeholder="Nome / Razão Social" type="text" name="nome_razaosocial" class="form-control @error('nome') is-invalid @enderror" id="nome_razaosocial">
                @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>E-mail: </label>
                <input placeholder="E-mail" type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Telefone: </label>
                <input placeholder="Telefone"type="text" name="telefone" class="form-control @error('telefone') is-invalid @enderror" id="telefone">
                @error('telefone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>CPF: </label>
                <textarea placeholder="CPF"type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror"
                    id="cpf">{{old('cpf')}}</textarea>
                @error('cpf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>CNPJ: </label>
                <textarea placeholder="CNPJ"type="text" name="cnpj" class="form-control @error('cnpj') is-invalid @enderror"
                    id="cpf">{{old('cnpj')}}</textarea>
                @error('cnpj')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>CEP: </label>
                <textarea placeholder="CEP"type="text" name="cep" class="form-control @error('cep') is-invalid @enderror"
                    id="cep">{{old('cep')}}</textarea>
                @error('cep')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Cidade: </label>
                <textarea placeholder="Cidade"type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror"
                    id="cep">{{old('cidade')}}</textarea>
                @error('cidade')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>UF: </label>
                <textarea placeholder="UF"type="text" name="uf" class="form-control @error('uf') is-invalid @enderror"
                    id="cep">{{old('uf')}}</textarea>
                @error('uf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Rua: </label>
                <textarea placeholder="Rua"type="text" name="rua" class="form-control @error('rua') is-invalid @enderror"
                    id="rua">{{old('rua')}}</textarea>
                @error('rua')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Número: </label>
                <textarea placeholder="Número"type="text" name="numero" class="form-control @error('numero') is-invalid @enderror"
                    id="cep">{{old('numero')}}</textarea>
                @error('numero')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Observação: </label>
                <textarea placeholder="Observação"type="text" name="observacao" class="form-control @error('observacao') is-invalid @enderror"
                    id="descricao">{{old('observacao')}}</textarea>
                @error('observacao')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Cadastrar cliente</button>

            <style>
            input[type=checkbox] {
                cursor: pointer;
                width: 22px;
            }
            </style>
        </form>
    </div>
</div>
@endsection