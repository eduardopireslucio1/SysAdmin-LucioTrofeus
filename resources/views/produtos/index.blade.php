@extends('layouts.admin')
@section('title','Lista de Produtos')

<style> 
    p{margin-top: 10px !important;}
    p{margin-left: 20px;}

   

</style>

@section('content')
<div class="col-md-11">
    <div class="painel panel-default">
        <div class="painel-heading" style="margin-top:8px !important;color: black">
            <h3><b>Produtos</b>
                <a href="{{route('produtos.create')}}" class="btn btn-sucess btn-sm" style="float: right; background-color: green; color: white"><strong>Cadastrar Produtos</strong></a>
            </h3>
        </div>
    </div>
</div>
<p class="text" style="color: #007FFF"><strong>Lista de produtos:</strong>
<div class="div card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Image</th>
                    <th>Preco</th>
                    <th>Cadastrado em</th>
                    <th>Atualizado em</th>
                    <th>Acao</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($models_produtos as $produto)
                <tr>
                    <td>{{$produto->id}}</td>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->image}}</td>
                    <td>{{$produto->preco}}</td>
                    <td>{{$produto->created_at}}</td>
                    <td>{{$produto->updated_at}}</td>
                    <td>
                        <a href="{{route('produtos.edit', $models_produtos)}}" class="btn btn-primary"><i
                                class="fas fa-edit"></i></a>
                        <a href="{{route('produtos.show', $models_produtos)}}" class="btn btn-info"><i
                                class="fas fa-eye" style="color:white"></i></a>
                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$models_produtos->render()}}
    </div>
</div>



@endsection