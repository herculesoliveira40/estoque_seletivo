@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')


<h1>Meus Produtos: </h1>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($produtos) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/produtos/{{ $produto->id }}">{{ $produto->title }}</a></td>
                    <td>0</td>
                    <td class="d-flex">
                        <a href="/produtos/edit/{{ $produto->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                        <form action="/produtos/{{ $produto->id }}" method="POST">
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
    <p>Você ainda não tem produtos, <a href="/produtos/create">criar produto</a></p>
    @endif
</div>

@endsection