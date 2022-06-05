
<!doctype html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/js/bootstrap-select.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/css/bootstrap-select.min.css"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />

    <meta charset="utf-8">
</head>


<body>
        <h4 class="display-4 text-center">Clientes com mais pedidos:</h4>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Posição</th>
                        <th scope="col">ID</th>
                        <th scope="col">Nome Cliente </th>
                        <th scope="col">Quantidade de Pedidos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    @php
                    $index = $index + 1;
                    @endphp
                        <tr>
                            <td>{{$index}}º</td>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->nome_razaosocial}} </td>
                            <td>{{$cliente->qtd_pedidos}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

</body> 
</html>