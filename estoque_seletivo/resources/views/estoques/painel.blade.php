@extends('layouts.main')
@section('title', 'Painel Estoque')
@section('content')

<h1>Painel de Estoque: </h1>
<div class="col-md-10 offset-md-1 dashboard-events-container">
<a href="/estoques/create" class="btn btn-success">Criar Estoque</a>

    @if(count($estoques) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col"> Quantidade</th>
                <th scope="col">Produto</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estoques as $estoque)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td >{{ $estoque->id }}</td>
                    <td>{{ $estoque->produto_id }}</td>
                    <td>{{ $estoque->quantidade }}</td>   
                    <td class="d-flex">
                        <a href="/estoques/edit/{{ $estoque->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                        <form action="/estoques/{{ $estoque->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    @else
    <p>Você ainda não tem estoques, <a href="/estoques/create">Criar estoque</a></p>
    @endif

</div>



@endsection