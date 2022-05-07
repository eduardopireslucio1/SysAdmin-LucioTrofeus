@extends('layouts.admin')
@section('title', $models_produtos->produtos)

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/images/produtos/{{$models_produtos->imagem}}" class="img-fluid" alt="">
        </div>
        <div id="info-container" class="col-md-6">
            <h1><strong>Nome do produto: <br></strong>{{$models_produtos->nome}}</h1>
            <div class="form-group">
                <strong>Nome do produto:</strong><input type="text" class="form-control" disabled value="{{($models_produtos->nome)}}">
            </div>
            <div class="form-group">
                <strong>Descrição:</strong><input type="text" class="form-control" disabled value="{{($models_produtos->descricao)}}">
            </div>
            <div class="form-group">
                <strong>Preço:</strong><input type="text" class="form-control" disabled value="R$ {{number_format($models_produtos->preco, 2, ',', '.')}}">
            </div>
            
            @if($models_produtos->status == 0)

               <a class="btn btn-danger btn-sm" style="background-color: red; color: white" >Inativo</a>
            @else
               <a class="btn btn-sucess btn-sm" style="background-color: green; color: white">Ativo</a>

            @endif
            
            
            </p>
            <p class="produto-material">
            <strong>Materiais: </strong>
            @foreach ($models_produtos->material as $material)
                <li>{{$material}}</li>
            @endforeach
            </p>
        </div>
    </div>
</div>


@endsection