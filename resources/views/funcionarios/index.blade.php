@extends('layouts.admin')
@section('title','Lista de Funcionarios')

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
                <div class="card card-success">
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
                        <th>id</th>
                        <th>Nome</th>
                        <th>Data de admissão</th>
                        <th>Carga horária/dia</th>
                        <th>Cargo</th>
                        <th>Salário</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models_funcionarios as $funcionario)
                    <tr>
                        <td>{{$funcionario->id}}</td>
                        <td>{{ucwords($funcionario->nome)}}</td>
                        <td>{{$funcionario->dt_admissao}}</td>
                        <td>{{$funcionario->carga_horaria}}</td>
                        <td>{{$funcionario->cargo}}</td>
                        <td>{{$funcionario->salario}}</td>
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
                </tbody>
            </table>
            {{$models_funcionarios->render()}}
        </div>
    </div>
</div>

@endsection