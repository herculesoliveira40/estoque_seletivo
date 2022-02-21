@extends('layouts.main')
@section('title', 'Painel Categoria')
@section('content')

<h1>Painel de Categoria: </h1>
<div class="col-md-10 offset-md-1 dashboard-events-container">
<a href="/categorias/create" class="btn btn-success"><i class="bi bi-plus-square-dotted"></i> Criar Categoria</a>

    @if(count($categorias) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>             
                <th scope="col">Nome Categoria</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>         
                    <td>{{ $categoria->nome }}</td>           
                    <td class="d-flex">
                        <a href="/categorias/edit/{{ $categoria->id }}" class="btn btn-info edit-btn"><i class="bi bi-wrench-adjustable"></i> Editar</a> 

                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    @else
    <p>Ainda não categorias, <a href="/estoques/create">Criar Categorias</a></p>
    @endif

</div>



@endsection