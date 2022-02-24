@extends('layouts.admin')
@section('title','Cadastrar Cliente')
@section('content-header','Cadastrar Cliente')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('clientes.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nome / Razão Social: <span class="obrigatorio">*</span></label>
                <input placeholder="Ex: Lúcio Troféus" type="text" name="nome_razaosocial" class="form-control @error('nome') is-invalid @enderror" id="nome_razaosocial">
                @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>E-mail: <span class="obrigatorio">*</span></label>
                <input placeholder="Ex: email@gmail.com" type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Telefone: <span class="obrigatorio">*</span></label>
                <input placeholder="Telefone"type="text" name="telefone" class="form-control @error('telefone') is-invalid @enderror" id="telefone">
                @error('telefone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>CPF: </label>
                <input placeholder="CPF"type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror"
                    id="cpf">{{old('cpf')}}</input>
                @error('cpf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>CNPJ: </label>
                <input placeholder="CNPJ"type="text" name="cnpj" class="form-control @error('cnpj') is-invalid @enderror"
                    id="cpf">{{old('cnpj')}}</input>
                @error('cnpj')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>CEP: <span class="obrigatorio">*</span></label>
                <input placeholder="CEP"type="text" name="cep" class="form-control @error('cep') is-invalid @enderror"
                    id="cep">{{old('cep')}}</input>
                @error('cep')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Cidade: <span class="obrigatorio">*</span></label>
                <input placeholder="Cidade"type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror"
                    id="cep">{{old('cidade')}}</input>
                @error('cidade')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Estado: <span class="obrigatorio">*</span></label>
                <input placeholder="UF"type="text" name="uf" class="form-control @error('uf') is-invalid @enderror"
                    id="cep">{{old('uf')}}</input>
                @error('uf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Rua: <span class="obrigatorio">*</span></label>
                <input placeholder="Rua"type="text" name="rua" class="form-control @error('rua') is-invalid @enderror"
                    id="rua">{{old('rua')}}</input>
                @error('rua')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Número: <span class="obrigatorio">*</span></label>
                <input placeholder="Número"type="text" name="numero" class="form-control @error('numero') is-invalid @enderror"
                    id="cep">{{old('numero')}}</input>
                @error('numero')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Observação: <span class="obrigatorio">*</span></label>
                <textarea placeholder="Observação"type="text" name="observacao" class="form-control @error('observacao') is-invalid @enderror"
                    id="descricao">{{old('observacao')}}</textarea>
                @error('observacao')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Cadastrar</button>

            <style>
            input[type=checkbox] {
                cursor: pointer;
                width: 22px;
            }

            .obrigatorio{
                color:red;
            }
            </style>
        </form>
    </div>
</div>

@endsection