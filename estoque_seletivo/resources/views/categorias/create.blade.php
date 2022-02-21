@extends('layouts.main')
@section('title', 'Criar Categoria')
@section('content')

<h1>Criar Categoria</h1>

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Criar Categoria</h1>
  <form action="/categorias" method="POST">
    @csrf               {{--DIRETIVA SALVAR DADOS NO BANCO--}}

    <div class="form-group">
      <label for="nome ">Nome da Categoria:</label>
      <input type="text" class="form-control" id="nome" name="nome">
    </div>

    <input type="submit" class="btn btn-primary" value="Criar Categoria">
  </form>
  
</div>


@endsection


