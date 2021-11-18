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
            <p class="produto-descricao"><br><strong>Descrição: </strong>{{$models_produtos->descricao}}</p>
            <p class="produto-preco"><strong>Preço: </strong>{{$models_produtos->preco}}</p>
            <p clas="produto-status"><strong>Status:  </strong>
            
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