@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<h1>Relatorio geral movimentaações </h1>

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
                    <td> {{($estoque->created_at)}}</td> 
                    <td> {{($estoque->name)}}</td> 
                </tr>
            @endforeach    
        </tbody> 
    </table>
        
   

   
@endsection