@extends('layouts.main')
@section('title', 'Editar Estoque')
@section('content')


<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editar Estoque {{ $estoque->id }}</h1>

  <form action="/estoques/update/{{ $estoque->id }}" method="POST">
    @csrf               {{--DIRETIVA SALVAR DADOS NO BANCO--}}
    @method('PUT')

    <div class="form-group">
      <label for="quantidade ">Quantidade atual do Produto:</label>
      <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ $estoque->produto_quantidade }}" disabled>
    </div>
    <div class="form-group">
      <label for="quantidade ">Quantidade movimentada:</label>
      <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ $estoque->quantidade_movimentada }}" disabled>
    </div>

    <div class="form-group">
      <label for="produto_id" class="form-label"> Produto: </label>
      <select  name="produto_id" id="produto_id"  class="form-control" placeholder="produto_id" disabled>  
        @foreach ($produtos as $produto)
        <option value="{{$produto->id}}" {{ $estoque->produto_id == ($loop->index +1) ? "selected='selected'" : ""}}>{{$produto->nome}}</option>
        @endforeach
      </select>  
    </div>
    <div class="form-group">
      <label for="created_at ">Criado em:</label>
      <input type="date" class="form-control" id="created_at" name="created_at" value="{{  $estoque->created_at->format('Y-m-d') }}" disabled>
    </div>
    <div class="form-group">
      <label for="status">Status: </label>
      <select name="status" id="status" class="form-control">
        <option value="0">Novo</option>
        <option value="1">Baixado</option>
      </select>
    </div> 

    <input type="submit" class="btn btn-primary" value="Editar Estoque">
  </form>
  
</div>


@endsection