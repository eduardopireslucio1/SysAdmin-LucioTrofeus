@extends('layouts.admin')


@section('content')

<div class="table"></div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Image</th>
            <th>Codigo-barra</th>
            <th>Preco</th>
            <th>Cadastrado em</th>
            <th>Atualizado em</th>
            <th>Acao</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($modelsProduto as $modelsProduto)
        <tr>
            <td>{{$modelsProduto->id}}</td>
            <td>{{$modelsProduto->nome}}</td>
            <td>{{$modelsProduto->image}}</td>
            <td>{{$modelsProduto->barcodigo}}</td>
            <td>{{$modelsProduto->preco}}</td>
            <td>{{$modelsProduto->created_at}}</td>
            <td>{{$modelsProduto->updated_at}}</td>
            <td>
                <a href="{{route('produtos.editar', $modelsProduto)}}">EDITAR </a>
                <button>DELETAR</button>
            </td>   
        </tr>
        @endforeach
    </tbody>
</table>

@endsection