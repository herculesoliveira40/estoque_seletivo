@extends('layouts.main')
@section('title', 'Criar Estoque')
@section('content')

<h1>Criar Estoque</h1>

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Criar Produto</h1>
  <form action="/estoques" method="POST">
    @csrf               {{--DIRETIVA SALVAR DADOS NO BANCO--}}

    <div class="form-group">
      <label for="quantidade ">Quantidade do Produto:</label>
      <input type="number" class="form-control" id="quantidade" name="quantidade">
    </div>

    <div class="form-group">
      <label for="produto_id" class="form-label"> Produto: </label>
      <input type="number" class="form-control" id="produto_id" name="produto_id">
    
    </div>

    <input type="submit" class="btn btn-primary" value="Criar Estoque">
  </form>
  
</div>


@endsection


