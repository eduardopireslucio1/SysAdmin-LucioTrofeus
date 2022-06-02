
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
        <h4 class="display-4 text-center">Produtos mais vendidos:</h4>
            <table class="table table-dark text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtosMaisVendidos as $produto)
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->nome}} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

</body> 
</html>