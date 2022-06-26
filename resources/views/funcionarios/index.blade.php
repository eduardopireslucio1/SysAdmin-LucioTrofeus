@extends('layouts.admin')
@section('title','Lista de Funcionarios')
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
                        <h3 class="card-title"><b>Funcionários</b>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <p class="text" style="color: #007FFF"><strong>Lista de funcionários:</strong>
            <a id="btn-funcionario" href="{{route('funcionarios.create')}}" class="btn btn-success btn-sm"
                style="float: right; "><strong>Cadastrar</strong></a>
    </div>
    <div class="div card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-1">ID</th>
                        <th class="col-1; alinhadoEsquerda">Nome</th>
                        <th class="col-1; alinhadoEsquerda">Data de admissão</th>
                        <th class="col-1; alinhadoEsquerda">Carga horária/dia</th>
                        <th class="col-1; alinhadoCentro">Cargo</th>
                        <th class="col-1"></th>
                        <th class="col-1">Salário</th>
                        <th class="col-2">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models_funcionarios as $funcionario)
                    <tr>
                        <td>{{$funcionario->id}}</td>
                        <td class="alinhadoEsquerda">{{ucwords($funcionario->nome)}}</td>
                        <td class="alinhadoEsquerda">{{ \Carbon\Carbon::parse($funcionario->dt_admissao)->format('d/m/Y')}}</td>
                        <td class="alinhadoEsquerda">{{$funcionario->carga_horaria}}</td>
                        <td class="alinhadoCentro">{{$funcionario->cargo}}</td>
                        <td class="alinhadoDireita">R$</td>
                        <td class="alinhadoDireita">{{number_format($funcionario->salario, 2, ',', '.')}}</td>
                        <td>
                            <a href="/admin/funcionarios/edit/{{$funcionario->id}}" class="btn btn-primary"><i
                                    class="fas fa-edit"></i></a>
                            <a href="/admin/funcionarios/{{$funcionario->id}}" class="btn btn-info"><i class="fas fa-eye"
                                    style="color:white"></i></a>

                            <form action="/admin/funcionarios/{{$funcionario->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($temEntrega == true)
                    <div class="alert alert-danger">
                        <ul>
                            NÃO FOI POSSÍVEL EXCLUIR O FUNCIONÁRIO!<br>
                            Motivo: contém ao menos uma entrega com esse funcionário!
                        </ul>
                    </div>
                    @elseif($podeExcluirFuncionario == true)
                    <div class="alert alert-success">
                        <ul>
                            FUNCIONÁRIO EXCLUÍDO COM SUCESSO!<br>
                        </ul>
                    </div>
                    @endif
                </tbody>
            </table>
            {{$models_funcionarios->render()}}
        </div>
    </div>
</div>

@endsection