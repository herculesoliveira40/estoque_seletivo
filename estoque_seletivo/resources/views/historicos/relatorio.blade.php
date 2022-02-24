<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Relatorio</title>
</head>
<body>
    <h1>Relatorio geral movimentações </h1>

    <table class="table">
            <thead>
                <tr>

                    <th scope="col">Produto </th>
                    <th scope="col">QTD Movimentada</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data</th>
                    <th scope="col">Funcionario</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estoques as $estoque)
                    <tr>
                        <td>{{ $estoque->nome}}</td> 
                        <td>{{ $estoque->quantidade_movimentada}}</td> 
                        <td>{{ $estoque->status == 0 ? "Novo" : "Baixado" }}</td> 
                        <td> {{ date('d/m/Y - H:i:s', strtotime($estoque->created_at)) }}</td> 
                        <td> {{($estoque->name)}}</td> 
                    </tr>
                @endforeach    
            </tbody> 
        </table>
</body>
</html>