@extends('layouts.main')
@section('title', 'Estoque historico')
@section('content')

<h1>Relatorio geral movimentações </h1>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    <a href="/estoques/historico/pdf" class="btn btn-warning"><i class="bi bi-printer-fill"></i> Imprimir Historico</a>


<table class="table">
        <thead>
            <tr>

                <th scope="col">Nome Produto: </th>
                <th scope="col"> Quantidade Movimentada</th>
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
</div>        
   

   
@endsection