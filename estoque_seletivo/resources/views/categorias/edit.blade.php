@extends('layouts.main')
@section('title', 'Editar Categoria')
@section('content')


<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editar Categoria {{ $categoria->id }}</h1>

  <form action="/categorias/update/{{ $categoria->id }}" method="POST">
    @csrf               {{--DIRETIVA SALVAR DADOS NO BANCO--}}
    @method('PUT')

    <div class="form-group">
      <label for="nome ">Nome da Categoria:</label>
      <input type="text" class="form-control" id="nome" name="nome" value="{{ $categoria->nome }}">
    </div>


    <input type="submit" class="btn btn-primary" value="Editar Categoria">
  </form>
  
</div>


@endsection