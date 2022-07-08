@extends('layouts.admin')
@section('title','Lista de entregas')
<link href="/css/cliente/clientes.css" rel="stylesheet">
<style>
p {
    margin-top: 10px !important;
}

p {
    margin-left: 20px;
}

form {
    display: inline-block;
}
</style>

@section('content')
<div class="container-fluid">
    <div style="padding:0px" class="col-md-12">
        <div class="painel panel-default">
            <div class="painel-heading" style="margin-top:8px !important;color: black">
                <div class="card card-info">
                    <div class="card-header">
                        <h3><b>Entregas</b>

                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <form action="{{route('entregasFiltraStatus')}}" method="GET" enctype="multipart/form-data">
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                    style="width:310px">
                    <option value="todos">Todos</option>
                    <option value="0" {{old('status'==0 ? 'selected' : '')}}>Pendente</option>
                    <option value="1" {{old('status'==1 ? 'selected' : '')}}>Em andamento</option>
                    <option value="2" {{old('status'==2 ? 'selected' : '')}}>Cancelado</option>
                    <option value="3" {{old('status'==3 ? 'selected' : '')}}>Concluído</option>
                </select>
        </div>
        <div class="col-1">
            <button class="btn btn-outline-info" type="submit">Filtrar</button>
        </div>
        </form>
        <div class="">
            <form action="{{route('searchEntregas')}}">
                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <input type="search" class="form-control form-control-lg" style="width:870px"
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
<div class="div card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th class="col-1">ID</th>
                    <th class="col-2">Pedido - Nome do cliente</th>
                    <th class="alinhadoCentro" class="col-4">Funcionário responsável</th>
                    <th class="col-2; alinhadoCentro">Data da entrega</th>
                    <th class=""></th>
                    <th class="col-1">Taxa de frete</th>
                    <th class="col-1">Cidade</th>
                    <th class="col-1">Informações</th>
                    <th class="col-1">Editar</th>
                    <th class="col-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entregas as $entrega)
                <tr>
                    <td>{{$entrega->id}}</td>
                    <td><a href="/admin/pedido/{{$entrega->pedido_id}}">{{$entrega->pedido_id}} -
                            {{$entrega->nome_razaosocial}}</a></td>
                    <td class="alinhadoCentro">{{$entrega->nome}}</td>
                    <td class="AlinhadoCentro">{{ \Carbon\Carbon::parse($entrega->dt_entrega)->format('d/m/Y')}}
                    </td>
                    <td class="alinhadoDireita">R$ </td>
                    <td class="alinhadoDireita">{{number_format($entrega->taxa_frete, 2, ',', '.')}}</td>
                    <td>{{$entrega->cidade}}</td>
                    <td class="alinhadoCentro"><a href="/admin/entrega/{{$entrega->id}}" class="btn btn-info"><i
                                class="fas fa-eye" style="color:white"></i></a></td>
                    <td><a href="/admin/entrega/edit/{{$entrega->id}}" class="btn btn-primary"><i
                                class="fas fa-edit"></i></a></td>
                    @if($entrega->status == 0)
                    <td><button class="btn btn-block btn-warning">Pendente</button></td>
                    @elseif($entrega->status == 1)
                    <td><button class="btn btn-block btn-primary">Em andamento</button></td>
                    @elseif($entrega->status == 2)
                    <td><button class="btn btn-block btn-danger">Cancelado</button></td>
                    @elseif($entrega->status == 3)
                    <td><button class="btn btn-block btn-success">Concluído</button></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
</div>


@endsection