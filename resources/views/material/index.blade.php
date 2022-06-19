@extends('layouts.admin')
@section('title','Lista de Materiais')
<link href="/css/cliente/clientes.css" rel="stylesheet">
<style>
p {
    margin-top: 10px !important;
    margin-left: 20px;
}

#btn-cliente {
    float: right;
    width: 100px;
    height: 30px;
    font-size: 15px;
}

h3 b{
    font-size: 22px;
}

.text {
    font-size: 18px;
}

form {
    display: inline-block;
}
</style>

@section('content')
<div class="container-fluid">
    <div style="padding:0px;" class="col-md-12">
        <div class="painel panel-default">
            <div class="painel-heading" style="margin-top:8px !important;color: black">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"><b>Registro de material</b>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <p class="text" style="color: #007FFF"><strong>Lista de materiais:</strong>
            <a id="btn-funcionario" href="{{route('material.create')}}" class="btn btn-success btn-sm"
                style="float: right; "><strong>Cadastrar</strong></a>
    </div>
    <div class="div card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-1">ID</th>
                        <th class="col-1; alinhadoCentro">Nome</th>
                        <th class="col-1; alinhadoEsquerda">Descrição</th>
                        <th class="alinhadoCentro" class="col-1">Quantidade</th>
                        <th class="col-1"></th>
                        <th class="col-1">Preço</th>
                        <th class="col-2">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models_materials as $material)
                    <tr>
                        <td>{{$material->id}}</td>
                        <td class="alinhadoCentro">{{ucwords($material->nome)}}</td>
                        <td class="alinhadoEsquerda">{{$material->descricao}}</td>
                        <td class="alinhadoCentro">{{$material->quantidade}}</td>
                        <td class="alinhadoDireita">R$</td>
                        <td class="alinhadoDireita">{{number_format($material->preco, 2, ',', '.')}}</td>
                        <td>
                            <a href="/admin/material/edit/{{$material->id}}" class="btn btn-primary"><i
                                    class="fas fa-edit"></i></a>
                            <a href="/admin/material/{{$material->id}}" class="btn btn-info"><i class="fas fa-eye"
                                    style="color:white"></i></a>

                            <form action="/admin/material/{{$material->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($excluiu == true)
                    <div class="alert alert-success">
                        <ul>
                            MATERIAL EXCLUÍDO COM SUCESSO!<br>
                        </ul>
                    </div>
                    @endif
                </tbody>
            </table>
            {{$models_materials->render()}}
        </div>
    </div>
</div>

@endsection