@extends('layouts.admin')
@section('title','Cadastrar Cliente CPF')
@section('content-header','Cadastrar Cliente CPF')

@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="/js/cliente/clientes.js"></script>
<script src="/js/integracao/integracao.js"></script>
<div class="container-fluid">
    <div class="row" style="margin-bottom:6vh">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Cadastro de cliente Físico</h3><br>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('clientes.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p name="opcao"></p>
                        <div class="row" id="margem" style="margin-bottom:2vh">
                            <div class="col-4">
                                <label>CPF:<span class="obrigatorio">*</span> </label>
                                <input placeholder="CPF" type="text" name="cpf" value="{{$array["cpf"]}}"
                                    class="form-control @error('cpf') is-invalid @enderror"
                                    id="cpf">{{old('cpf')}}</input>
                                @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label>Nome: <span class="obrigatorio">*</span></label>
                                <input placeholder="Ex: Lúcio Troféus" type="text" name="nome_razaosocial" value="{{$array["nome_razaosocial"]}}"
                                    class="form-control @error('nome') is-invalid @enderror" id="nome">
                                @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label>Telefone: <span class="obrigatorio">*</span></label>
                                <input placeholder="Telefone" type="text" name="telefone" value="{{$array["telefone"]}}"
                                    class="form-control @error('telefone') is-invalid @enderror" id="telefone">
                                @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row" id="margem" style="margin-bottom:2vh">
                            <div class="col-4">
                                <label>CEP: <span class="obrigatorio">*</span></label>
                                <input placeholder="CEP" type="text" name="cep" onblur="checkCep(this.value)" autocomplete="off"
                                    class="form-control @error('cep') is-invalid @enderror" value="{{$array["cep"]}}"
                                    id="cep">{{old('cep')}}</input>
                                @error('cep')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="col-4">
                                <label>Estado: <span class="obrigatorio">*</span></label>
                                <input placeholder="UF" type="text" name="uf" value="{{$array["uf"]}}"
                                    class="form-control @error('uf') is-invalid @enderror"
                                    id="estado">{{old('uf')}}</input>
                                @error('uf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label>Cidade: <span class="obrigatorio">*</span></label>
                                <input placeholder="Cidade" type="text" name="cidade" value="{{$array["cidade"]}}"
                                    class="form-control @error('cidade') is-invalid @enderror"
                                    id="cidade">{{old('cidade')}}</input>
                                @error('cidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row" id="margem" style="margin-bottom:2vh">
                            <div class="col-4">
                                <label>Logradouro: <span class="obrigatorio">*</span></label>
                                <input placeholder="Logradouro" type="text" name="logradouro" value="{{$array["logradouro"]}}"
                                    class="form-control @error('logradouro') is-invalid @enderror"
                                    id="logradouro">{{old('logradouro')}}</input>
                                @error('logradouro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label>Número: <span class="obrigatorio">*</span></label>
                                <input placeholder="Número" type="text" name="numero" value="{{$array["numero"]}}"
                                    class="form-control @error('numero') is-invalid @enderror"
                                    id="numero">{{old('numero')}}</input>
                                @error('numero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label>E-mail:</label>
                                <input placeholder="Ex: email@gmail.com" type="text" name="email" value="{{$array["email"]}}"
                                    class="form-control @error('email') is-invalid @enderror" id="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row" id="margem" style="margin-bottom:2vh">
                            <div class="col-12">
                                <label>Observação:</label>
                                <textarea placeholder="Observação" type="text" name="observacao" value="{{$array["observacao"]}}"
                                    class="form-control @error('observacao') is-invalid @enderror"
                                    id="descricao">{{old('observacao')}}</textarea>
                                @error('observacao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        @if(!$validar_cpf)
                        <div class="row">
                            <div class="col-3">
                                <div class="alert alert-danger">
                                    <ul>
                                        CPF Inválido!<br>
                                        Digite novamente!
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($cliente_cadastrado)
                        <div class="row">
                            <div class="col-3">
                                <div class="alert alert-danger">
                                    <ul>
                                        Este CPF já está cadastrado!<br>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif

                        <button class="btn btn-primary" type="submit">Cadastrar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>

<script>
var cleave = new Cleave('#cep', {
    delimiters: ['-'],
    blocks: [5, 3],
    numericOnly: true
});


var cleave = new Cleave('#cpf', {
    delimiters: ['.', '.', '-'],
    blocks: [3, 3, 3, 2],
    numericOnly: true
});

var cleave = new Cleave('#telefone', {
    delimiters: ['(', ')', '-'],
    blocks: [0, 2, 5, 4],
    numericOnly: true
});
</script>

<style>
input[type=checkbox] {
    cursor: pointer;
    width: 22px;
}

.obrigatorio {
    color: red;
}
</style>


@endsection