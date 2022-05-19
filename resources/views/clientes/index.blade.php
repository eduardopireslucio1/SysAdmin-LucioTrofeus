@extends('layouts.admin')
@section('title','Lista de Clientes')

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
        <p class="text" style="color: #007FFF"><strong>Lista de clientes:</strong>
            <a id="btn-cliente" href="{{route('clientes.create', ['opcao' => 'cpf'])}}" class="btn btn-success btn-sm"
                style="float: right; "><strong>CPF</strong></a>
            <a id="btn-cliente" href="{{route('clientes.create', ['opcao' => 'cnpj'])}}" class="btn btn-success btn-sm"
                style="float: right; "><strong>CNPJ</strong></a>
            </a>
    </div>
    <div class="div card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nome / Razão Social</th>
                        <th> CPF/CNPJ </th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models_clientes as $cliente)
                    <tr>
                        <td>{{$cliente->id}}</td>
                        <td>{{ucwords($cliente->nome_razaosocial)}}</td>
                        <td> {{$cliente->getDocument()}} </td>
                        <td>{{$cliente->email}}</td>
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
                            NÃO FOI POSSÍVEL EXCLUIR O CLIENTE!<br>
                            Motivo: contém ao menos um pedido com esse cliente!
                        </ul>
                    </div>
                    @elseif($podeExcluirCliente == true)
                    <div class="alert alert-success">
                        <ul>
                            CLIENTE EXCLUÍDO COM SUCESSO!<br>
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