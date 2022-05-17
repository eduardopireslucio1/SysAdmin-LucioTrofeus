@extends('layouts.admin')
@section('title','Cadastrar Cliente CPF')
@section('content-header','Cadastrar Cliente CPF')

@section('content')

<script src="/js/cliente/clientes.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



            <style>
            input[type=checkbox] {
                cursor: pointer;
                width: 22px;
            }

            .obrigatorio {
                color: red;
            }
            </style>


            <script>
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
        </form>
    </div>
</div>

@endsection