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
        @foreach ($models_produtos as $produto)
        <tr>
            <td>{{$produto->id}}</td>
            <td>{{$produto->nome}}</td>
            <td>{{$produto->image}}</td>
            <td>{{$produto->barcodigo}}</td>
            <td>{{$produto->preco}}</td>
            <td>{{$produto->created_at}}</td>
            <td>{{$produto->updated_at}}</td>
            <td>
                <a href="{{route('produtos.edit', $produto)}}">EDITAR </a>
                <button>DELETAR</button>
            </td>   
        </tr>
        @endforeach
    </tbody>
</table>

@endsection