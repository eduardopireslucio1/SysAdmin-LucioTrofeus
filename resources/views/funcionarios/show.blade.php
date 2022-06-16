@extends('layouts.admin')
@section('title', $models_funcionarios->nome)

@section('content')

<div class="container-fluid">
    <div style="padding:0px;" class="col-md-12">
        <div class="painel panel-default">
            <div class="painel-heading" style="margin-top:8px !important;color: black">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"><b>Informações do Funcionário</b></h3>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="margin-bottom:6vh">
                            <div class="col-3">
                                <strong>Nome:</strong><input type="text" class="form-control" disabled
                                    value="{{($models_funcionarios->nome)}}">
                            </div>

                            <div class="col-3">
                                <strong>CPF:</strong><input type="text" class="form-control" disabled
                                    value="{{($models_funcionarios->cpf)}}">
                            </div>

                            <div class="col-3">
                                <strong>Data de nascimento:</strong><input type="text" class="form-control" disabled
                                    value="{{ \Carbon\Carbon::parse($models_funcionarios->dt_nascimento)->format('d/m/Y')}}">
                            </div>

                            <div class="col-3">
                                <strong>Data de admissão:</strong><input type="text" class="form-control" disabled
                                    value="{{ \Carbon\Carbon::parse($models_funcionarios->dt_admissao)->format('d/m/Y')}}">
                            </div>
                        </div>

                        <div class="row" style="margin-bottom:6vh">
                            <div class="col-3">
                                <strong>Carga horária / por dia:</strong><input type="text" class="form-control"
                                    disabled value="{{($models_funcionarios->carga_horaria)}}">
                            </div>

                            <div class="col-3">
                                <strong>Cargo:</strong><input type="text" class="form-control" disabled
                                    value="{{($models_funcionarios->cargo)}}">
                            </div>

                            <div class="col-3">
                                <strong>Salário:</strong><input type="text" class="form-control" disabled
                                    value="R$ {{number_format($models_funcionarios->salario, 2, ',', '.')}}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection