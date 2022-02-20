@extends('layouts.main')
@section('title', 'Editar Estoque')
@section('content')


<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editar Estoque {{ $estoque->id }}</h1>

  <form action="/estoques/update/{{ $estoque->id }}" method="POST">
    @csrf               {{--DIRETIVA SALVAR DADOS NO BANCO--}}
    @method('PUT')

    <div class="form-group">
      <label for="quantidade ">Quantidade do Produto:</label>
      <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ $estoque->quantidade }}">
    </div>

    <div class="form-group">
      <label for="produto_id" class="form-label"> Produto: </label>
      <select  name="produto_id" id="produto_id"  class="form-control" placeholder="produto_id">  
        @foreach ($produtos as $produto)
        <option value="{{$produto->id}}">{{$produto->nome}}</option>
        @endforeach
      </select>  
    </div>

    <input type="submit" class="btn btn-primary" value="Editar Estoque">
  </form>
  
</div>


@endsection