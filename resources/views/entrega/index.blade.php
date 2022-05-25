@extends('layouts.admin')
@section('title','Lista de entregas')

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
    <p class="text" style="color: #007FFF"><strong>Lista de entregas:</strong>
    <div class="div card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Funcionário responsável</th>
                        <th>Data da entrega</th>
                        <th>Taxa de frete</th>
                        <th>Cidade</th>
                        <th>Informações</th>
                        <th>Editar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entregas as $entrega)
                    <tr>
                        <td>{{$entrega->id}}</td>
                        <td>{{$entrega->nome}}</td>
                        <td>{{ \Carbon\Carbon::parse($entrega->dt_entrega)->format('d/m/Y')}}</td>
                        <td>R$ {{number_format($entrega->taxa_frete, 2, ',', '.')}}</td>
                        <td>{{$entrega->cidade}}</td>
                        <td><a href="/admin/entrega/{{$entrega->id}}" class="btn btn-info"><i class="fas fa-eye"
                                    style="color:white"></i></a></td>
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