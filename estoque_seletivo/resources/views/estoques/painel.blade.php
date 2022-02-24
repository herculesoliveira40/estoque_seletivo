@extends('layouts.main')
@section('title', 'Painel  Estoque')
@section('content')

<h1>Painel Movimentações de Estoque: </h1>
<div class="col-md-10 offset-md-1 dashboard-events-container">
<!-- <a href="/estoques/create" class="btn btn-success"><i class="bi bi-plus-square-dotted"></i> Criar Estoque</a> -->

    @if(count($estoques) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>             
                <th scope="col">Produto</th>
                <th scope="col"> Quantidade Atual</th>
                <th scope="col"> Quantidade Anterior</th>
                <th scope="col"> Quantidade Movimentada</th>
                <th scope="col">Status</th>
                <th scope="col">Data:</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estoques as $estoque)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>         
                    <td><a href="/produtos/{{ $estoque->produto_id }}">{{ $estoque->nome }}</a></td> 
                    <td>{{ $estoque->produto_quantidade }}</td>           
                    <!-- <td class="d-flex">
                        <a href="/estoques/edit/{{ $estoque->id }}" class="btn btn-info edit-btn"><i class="bi bi-wrench-adjustable"></i> Editar</a> 
                        <form action="/estoques/{{ $estoque->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn" style="margin-left: 10px;"><i class="bi bi-trash3-fill" ></i> Deletar</button>
                        </form>
                    </td> -->
                    <td>{{ $estoque->produto_quantidade_anterior }}</td> 
                    <td>{{ $estoque->quantidade_movimentada}}</td> 
                    <td><a class="btn btn-success">{{ $estoque->status == 0 ? "Novo" : "Baixado"}}</a></td> 
                    <td>{{ $estoque->created_at }}</td> 
                    <td> <a href="/estoques/edit/{{ $estoque->id }}" class="btn btn-info edit-btn"><i class="bi bi-wrench-adjustable"></i> Editar</a> </td>

                </tr>
            @endforeach    
        </tbody>
    </table>
    @else
    <p>Você ainda não tem movimentações no estoques
    @endif

</div>



@endsection