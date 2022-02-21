@extends('layouts.main')
@section('title', 'Editar Produtos'. $produto->nome)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Editando Produto {{ $produto->id }}</h1>
  <form action="/produtos/update/{{ $produto->id }}" method="POST" enctype="multipart/form-data">
    @csrf               {{--DIRETIVA SALVAR DADOS NO BANCO--}}
    @method('PUT')
    <div class="form-group">
      <label for="imagem">Imagem:</label>
      <input type="file" class="form-control-file" id="imagem" name="imagem">
      <img class="img-preview w-50" src="/img/produtos/{{ $produto->imagem }}">
    </div>
    <div class="form-group">
      <label for="nome">Nome Produto:</label>
      <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome }}">
    </div>
    <div class="form-group">
      <label for="fabricante">Fabricante Produto:</label>
      <input type="text" class="form-control" id="fabricante" name="fabricante" value="{{ $produto->fabricante}}">
    </div>
    <div class="form-group">
      <label for="modelo">Modelo Produto:</label>
      <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $produto->modelo}}">
    </div>
    <div class="form-group">
      <label for="cor">Cor do Produto:</label>
      <input type="text" class="form-control" id="cor" name="cor" value="{{ $produto->cor}}">
    </div>
    <div class="form-group">
      <label for="sku">sku do Produto:</label>
      <input type="text" class="form-control" id="sku" name="sku" value="{{ $produto->sku}}">
    </div>
    <div class="form-group">
      <label for="valor">Valor do Produto:</label>
      <input type="number" class="form-control" id="valor" name="valor" value="{{ $produto->valor}}" step=".01">
    </div>
    <div class="form-group">
      <label for="descricao">Descrição:</label>
      <textarea name="descricao" id="descricao" class="form-control" > {{$produto->descricao}} </textarea>
    </div>
    <div class="form-group">
      <label for="data_fabricacao">Data Fabricação:</label>
      <input type="date" class="form-control" id="data_fabricacao" name="data_fabricacao" value="{{$produto->data_fabricacao->format('Y-m-d')}}">
    </div>
    <div class="form-group">
      <label for="data_vencimento">Data de Vencimento:</label>
      <input type="date" class="form-control" id="data_vencimento" name="data_vencimento" value="{{$produto->data_vencimento->format('Y-m-d')}}">
    </div>
    <div class="form-group">
      <label for="categoria_id" class="form-label"> Categoria do Produto: </label>
      <select  name="categoria_id" id="categoria_id"  class="form-control">  
          @foreach ($categorias as $categoria)
          <option value="{{$categoria->id}}" {{ $produto->categoria_id == ($loop->index +1) ? "selected='selected'" : ""}}>{{$categoria->nome}}</option>
          @endforeach
      </select>  
    </div>
    <div class="form-group">
      <label for="disponivel">Disponivel?</label>
      <select name="disponivel" id="disponivel" class="form-control">
        <option value="0">Não</option>
        <option value="1" {{ $produto->disponivel == 1 ? "selected='selected'" : ""}}>Sim</option>
      </select>
    </div>    


    <input type="submit" class="btn btn-primary" value="Editar Produto">
  </form>
  
</div>



@endsection