@extends('layouts.admin')
@section('title','Lista de Produtos')

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

h3 b{
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
                <div class="card card-success">
                    <div class="card-header">
                        <h3><b>Produtos</b> </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="text" style="color: #007FFF"><strong>Lista de produtos:</strong>
    <a id="btn-produtos" href="{{route('produtos.create')}}" class="btn btn-success btn-sm" style="float: right"><strong>Cadastrar</strong></a>
        @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    <div class="div card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Cadastrado em</th>
                        <th>Atualizado em</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models_produtos as $produto)
                    <tr>
                        <td>{{$produto->id}}</td>
                        <td>{{ucfirst($produto->nome)}}</td>
                        <td>R$ {{number_format($produto->preco, 2, ',', '.')}}</td>
                        <td>{{$produto->created_at->format('d/m/Y')}}</td>
                        <td>{{$produto->updated_at->format('d/m/Y')}}</td>
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
                </tbody>
            </table>
            {{$models_produtos->render()}}
        </div>
    </div>
</div>


@endsection