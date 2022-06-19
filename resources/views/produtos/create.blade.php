@extends('layouts.admin')
@section('title','Cadastrar Produtos')
@section('content-header','Cadastrar Produtos')

@section('content')

<div class="container-fluid">
    <div class="row" style="margin-bottom:6vh">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Cadastro de Produto</h3><br>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('produtos.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="margin-bottom:6vh">
                            <div class="col-3">
                                <label>Nome do produto: <span class="obrigatorio">*</span></label>
                                <input placeholder="Nome" type="text" name="nome"
                                    class="form-control @error('nome') is-invalid @enderror" id="nome">
                                @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="col-3">
                                <label>Descrição do produto: </label>
                                <textarea placeholder="Descrição" type="text" name="descricao"
                                    class="form-control @error('descricao') is-invalid @enderror"
                                    id="descricao">{{old('descricao')}}</textarea>
                                @error('descricao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label>Enviar imagem (referência): </label>
                                <div class="custom-file">
                                    <input type="file" id="imagem" class="custom-file-input" name="imagem" value="">
                                    <label for="imagem" class="custom-file-label">Enviar imagem </label>
                                </div>
                                @error('imagem')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row" style="margin-bottom:6vh">
                            <div class="col-3">
                                <label>Preço: <span class="obrigatorio">*</span></label>
                                <input placeholder="preço" type="text" name="preco"
                                    class="form-control @error('preco') is-invalid @enderror" id="preco">
                                @error('preco')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label>Material a utilizar: <span class="obrigatorio">*</span></label>
                                <input type="checkbox" name="material[]" value="Acrilico"
                                    class="form-control @error('material') is-invalid @enderror"
                                    id="material">Acrílico</input>
                                <input type="checkbox" name="material[]" value="MDF"
                                    class="form-control @error('material') is-invalid @enderror"
                                    id="material">MDF</input>
                                @error('material')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label>Status: <span class="obrigatorio">*</span></label>
                                <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                    <option value="1" {{old('status'==1 ? 'selected' : '')}}>Ativo</option>
                                    <option value="0" {{old('status'==0 ? 'selected' : '')}}>Inativo</option>
                                </select>
                                @error('status')
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