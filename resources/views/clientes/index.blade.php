@extends('layouts.admin')
@section('title','Lista de Clientes')
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
    margin: 0 8px;
}

h3 b {
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
                        <h3 class="card-title"><b>Clientes</b>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <a id="btn-cliente" href="{{route('clientes.create', ['opcao' => 'cpf'])}}" class="btn btn-success btn-sm"
            style="float: right; "><strong>CPF</strong></a>
        <a id="btn-cliente" href="{{route('clientes.create', ['opcao' => 'cnpj'])}}" class="btn btn-success btn-sm"
            style="float: right; "><strong>CNPJ</strong></a>
        </a>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('searchClientes')}}">
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" class="form-control form-control-lg" style="width:700px"
                                    placeholder="Pesquisar" name="search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="div card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th class="alinhadoCentro">Nome / Raz??o Social</th>
                        <th> CPF/CNPJ </th>
                        <th> Tipo </th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>A????o</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models_clientes as $cliente)
                    <tr>
                        <td>{{$cliente->id}}</td>
                        <td class="alinhadoCentro">{{ucwords($cliente->nome_razaosocial)}}</td>
                        <td> {{$cliente->getDocument()}} </td>
                        <td> {{$cliente->inTipo}} </td>
                        <td>{{$cliente->telefone}}</td>
                        <td>{{ucfirst($cliente->cidade)}}</td>
                        <td>{{strtoupper($cliente->uf)}}</td>
                        <td>
                            <a href="/admin/clientes/edit/{{$cliente->id}}" class="btn btn-primary"><i
                                    class="fas fa-edit"></i></a>
                            <a href="/admin/clientes/{{$cliente->id}}" class="btn btn-info"><i class="fas fa-eye"
                                    style="color:white"></i></a>

                            <form action="/admin/clientes/{{$cliente->id}}" method="POST">
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
                            N??O FOI POSS??VEL EXCLUIR O CLIENTE!<br>
                            Motivo: cont??m ao menos um pedido com esse cliente!
                        </ul>
                    </div>
                    @elseif($podeExcluirCliente == true)
                    <div class="alert alert-success">
                        <ul>
                            CLIENTE EXCLU??DO COM SUCESSO!<br>
                        </ul>
                    </div>
                    @endif
                </tbody>
            </table>
            {{$models_clientes->render()}}
        </div>
    </div>
</div>

@endsection