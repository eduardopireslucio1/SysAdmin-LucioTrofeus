@extends('layouts.admin')
@section('title','Cadastrar Cliente')
@section('content-header','Cadastrar Cliente')

@section('content')

<script src="/js/cliente/clientes.js"></script>
<link href="/css/cliente/clientes.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



@if($opcao == "cpf")
    @include('clientes.clientecpf')
@elseif($opcao == "cnpj")
    @include('clientes.clientecnpj')

@endif
<script>

var cleave = new Cleave('#cpf', {
    delimiters: ['.', '.', '.', '-'],
    blocks: [3, 3, 3, 2],
    numericOnly: true
});


var cleave = new Cleave('#cnpj', {
    delimiters: ['.', '.', '/', '-'],
    blocks: [2, 3, 3, 4, 2],
    numericOnly: true
});

var cleave = new Cleave('#cep', {
    delimiters: ['-'],
    blocks: [5, 3],
    numericOnly: true
});

var cleave = new Cleave('#telefone', {
    delimiters: ['(', ')', '-'],
    blocks: [0, 2, 5, 4],
    numericOnly: true
});
</script>
@endsection