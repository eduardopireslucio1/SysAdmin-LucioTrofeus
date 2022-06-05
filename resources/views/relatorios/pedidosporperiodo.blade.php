<!doctype html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/js/bootstrap-select.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/css/bootstrap-select.min.css"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"
        rel="stylesheet" />

    <meta charset="utf-8">
</head>


<body>
    <h1 class="display-4 text-center">Pedidos por período:</h1>
    <h5>Data inicial: {{ \Carbon\Carbon::parse($pedido_data_inicial)->format('d/m/Y')}}</h5>
    <h5>Data final: {{ \Carbon\Carbon::parse($pedido_data_final)->format('d/m/Y')}}</h5>
    </div>
    <div class="pedidos">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cliente </th>
                    <th scope="col">Data da entrega: </th>
                    <th scope="col">Valor total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                @if($pedido->status == 3)
                <tr>
                    <td>{{$pedido->id}}</td>
                    <td>{{$pedido->models_cliente->nome_razaosocial}} </td>
                    <td>{{ \Carbon\Carbon::parse($pedido->data_entrega)->format('d/m/Y')}}</td>
                    <td>{{$pedido->valor_total}}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>