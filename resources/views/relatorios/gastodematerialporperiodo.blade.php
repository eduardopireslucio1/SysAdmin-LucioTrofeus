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
    <h1 class="display-4 text-center">Gasto de material por período:</h1>
        <h5>Data inicial: {{ \Carbon\Carbon::parse($material_data_inicial)->format('d/m/Y')}}</h5>
        <h5>Data final: {{ \Carbon\Carbon::parse($material_data_final)->format('d/m/Y')}}</h5>
        <h5>Valor total: R$ {{number_format($valor_bruto, 2, ',', '.')}}</h5>
    <div class="materiais">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome </th>
                    <th scope="col">Descrição </th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materiais as $material)
                @php
                $valor_total = $material->preco * $material->quantidade
                @endphp
                <tr>
                    <td>{{$material->id}}</td>
                    <td>{{$material->nome}} </td>
                    <td>{{$material->descricao}}</td>
                    <td>{{$material->quantidade}}</td>
                    <td>R$ {{number_format($material->preco, 2, ',', '.')}}</td>
                    <td>R$ {{number_format($valor_total, 2, ',', '.')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>