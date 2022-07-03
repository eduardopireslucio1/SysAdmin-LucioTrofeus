@extends('layouts.admin')
@section('title','Lista de Produtos')
<link href="/css/cliente/clientes.css" rel="stylesheet">
<style>
p {
    margin-top: 10px !important;
    margin-left: 20px;
}

#btn-produtos {
    float: right;
    width: 100px;
    height: 30px;
    font-size: 15px;
}

.text {
    font-size: 18px;
}

h3 b {
    font-size: 22px;
}

form {
    display: inline-block;
}
</style>

@section('content')
<div class="container-fluid">
    <div class="col-md-12" style="padding:0px">
        <div class="painel panel-default">
            <div class="painel-heading" style="margin-top:8px !important;color: black">
                <div class="card card-info">
                    <div class="card-header">
                        <h3><b>Produtos</b> </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="text" style="color: #007FFF"><strong>Lista de produtos:</strong>
        <a id="btn-produtos" href="{{route('produtos.create')}}" class="btn btn-success btn-sm"
            style="float: right"><strong>Cadastrar</strong></a>
        @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    <div class="div card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-1">ID</th>
                        <th class="col-1; alinhadoCentro">Nome</th>
                        <th class="col-1; alinhadoCentro">Status</th>
                        <th class="col-1"></th>
                        <th class="col-1">Preço</th>
                        <th class="col-2; alinhadoCentro">Cadastrado em</th>
                        <th class="col-2; alinhadoCentro">Atualizado em</th>
                        <th class="col-2">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models_produtos as $produto)
                    <tr>
                        <td>{{$produto->id}}</td>
                        <td class="alinhadoCentro">{{ucfirst($produto->nome)}}</td>
                        <td>@if($produto->status == 0)

                            <a class="btn btn-danger btn-sm" style="background-color: red; color: white; margin-left:80px">I</a>
                            @else
                            <a class="btn btn-sucess btn-sm" style="background-color: green; color: white; margin-left:80px">A</a>

                            @endif
                        </td>
                        <td class="alinhadoDireita">R$</td>
                        <td class="alinhadoDireita">{{number_format($produto->preco, 2, ',', '.')}}</td>
                        <td class="alinhadoCentro">{{$produto->created_at->format('d/m/Y')}}</td>
                        <td class="alinhadoCentro">{{$produto->updated_at->format('d/m/Y')}}</td>
                        <td>
                            <a href="/admin/produtos/edit/{{$produto->id}}" class="btn btn-primary"><i
                                    class="fas fa-edit"></i></a>
                            <a href="/admin/produtos/{{$produto->id}}" class="btn btn-info"><i class="fas fa-eye"
                                    style="color:white"></i></a>
                            <form action="/admin/produtos/{{$produto->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($tempedido == true)
                    <div class="alert alert-danger">
                        <ul>
                            NÃO FOI POSSÍVEL EXCLUIR O PRODUTO!<br>
                            Motivo: contém ao menos um pedido com esse produto!
                        </ul>
                    </div>
                    @elseif($podeExcluirProduto == true)
                    <div class="alert alert-success">
                        <ul>
                            PRODUTO EXCLUÍDO COM SUCESSO!<br>
                        </ul>
                    </div>
                    @endif
                </tbody>
            </table>
            {{$models_produtos->render()}}
        </div>
    </div>
</div>


@endsection