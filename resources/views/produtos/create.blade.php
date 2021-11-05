@extends('layouts.admin')
@section('title','Cadastrar Produtos')
@section('content-header','Cadastrar Produtos')

@section('content')
<form action="{{route('produtos.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Nome do produto: </label>
            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="nome">
            @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

</form>
@endsection