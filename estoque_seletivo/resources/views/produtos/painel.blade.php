@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')


<h1>Painel de Produtos: </h1>
<div class="col-md-10 offset-md-1 dashboard-events-container">
<a href="/produtos/create" class="btn btn-success"><i class="bi bi-plus-square-dotted"></i> Criar Produtos</a>

    @if(count($produtos) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome Produto</th>
                <th scope="col">sku</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/produtos/{{ $produto->id }}">{{ $produto->nome }}</a></td>
                    <td>{{ $produto->sku }}</td>
                    <td class="d-flex">
                        <a href="/produtos/edit/{{ $produto->id }}" class="btn btn-info edit-btn"><i class="bi bi-wrench-adjustable"></i> Editar</a> 
                        <form action="/produtos/{{ $produto->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn" style="margin-left: 10px;"><i class="bi bi-trash3-fill"></i> Deletar</button>
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