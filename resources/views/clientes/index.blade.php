@extends('layouts.admin')
@section('title','Lista de Clientes')

<style> 
    p{margin-top: 10px !important;}
    p{margin-left: 20px;}

   form{
       display: inline-block;
   }

</style>

@section('content')
<div class="col-md-11">
    <div class="painel panel-default">
        <div class="painel-heading" style="margin-top:8px !important;color: black">
            <h3><b>Clientes</b>
                <a href="{{route('clientes.create')}}" class="btn btn-sucess btn-sm" style="float: right; background-color: green; color: white"><strong>Cadastrar Cliente</strong></a>
            </h3>
        </div>
    </div>
</div>
<p class="text" style="color: #007FFF"><strong>Lista de clientes:</strong>
<div class="div card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nome / Razão Social</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Cidade</th>
                    <th>UF</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($models_clientes as $cliente)
                <tr>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->nome_razaosocial}}</td>
                    <td>{{$cliente->email}}</td>
                    <td>{{$cliente->telefone}}</td>
                    <td>{{$cliente->cidade}}</td>
                    <td>{{$cliente->uf}}</td>
                    <td>
                        <a href="/admin/clientes/edit/{{$cliente->id}}" class="btn btn-primary"><i
                                class="fas fa-edit"></i></a>
                        <a href="/admin/clientes/{{$cliente->id}}" class="btn btn-info"><i
                                class="fas fa-eye" style="color:white"></i></a>
                        <form action="/admin/cliente/{{$cliente->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$models_clientes->render()}}
    </div>
</div>



@endsection