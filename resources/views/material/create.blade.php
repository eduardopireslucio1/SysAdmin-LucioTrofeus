@extends('layouts.admin')
@section('title','Cadastrar Funcionário')
@section('content-header','Cadastrar Funcionário')

@section('content')

<script src="/js/cliente/clientes.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<div class="container-fluid">
    <div class="row" style="margin-bottom:6vh">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Cadastro de Material</h3><br>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('material.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row" style="margin-bottom:6vh">
                            <div class="col-3">
                                <label>Nome: <span class="obrigatorio">*</span></label>
                                <input placeholder="Ex: Cola" type="text" name="nome"
                                    class="form-control @error('nome') is-invalid @enderror" id="nome">
                                @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label>Descrição:</label>
                                <input type="text" name="descricao" placeholder="Descrição"
                                    class="form-control @error('descricao') is-invalid @enderror" id="descricao">
                                @error('descricao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row" style="margin-bottom:6vh">
                            <div class="col-3">
                                <label>Quantidade: <span class="obrigatorio">*</span></label>
                                <input type="number" name="quantidade" placeholder="Ex: 8 unidades"
                                    class="form-control @error('quantidade') is-invalid @enderror" id="quantidade">
                                @error('quantidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label>Preço (unidade): <span class="obrigatorio">*</span></label>
                                <input type="text" name="preco" placeholder="R$"
                                    class="form-control @error('preco') is-invalid @enderror" id="preco">
                                @error('preco')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
input[type=checkbox] {
    cursor: pointer;
    width: 22px;
}

.obrigatorio {
    color: red;
}
</style>

</form>
</div>
</div>

@endsection