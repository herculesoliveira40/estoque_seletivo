@extends('layouts.main')
@section('title', 'Criar Produtos')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Criar Produto</h1>
  <form action="/produtos" method="POST" enctype="multipart/form-data">
    @csrf               {{--DIRETIVA SALVAR DADOS NO BANCO--}}
    <div class="form-group">
      <label for="imagem">Imagem:</label>
      <input type="file" class="form-control-file" id="imagem" name="imagem" required>
    </div>
    <div class="form-group">
      <label for="nome">Nome Produto:</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Produto">
    </div>
    <div class="form-group">
      <label for="fabricante">Fabricante Produto:</label>
      <input type="text" class="form-control" id="fabricante" name="fabricante" placeholder="Fabricante do Produto">
    </div>
    <div class="form-group">
      <label for="modelo">Modelo Produto:</label>
      <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo do Produto">
    </div>
    <div class="form-group">
      <label for="cor">Cor do Produto:</label>
      <input type="text" class="form-control" id="cor" name="cor" placeholder="Cor do Produto">
    </div>
    <div class="form-group">
      <label for="sku">sku do Produto:</label>
      <input type="text" class="form-control" id="sku" name="sku" placeholder="sku">
    </div>
    <div class="form-group">
      <label for="valor">Valor do Produto:</label>
      <input type="number" class="form-control" id="valor" name="valor" placeholder="Valor do Produto">
    </div>
    <div class="form-group">
      <label for="descricao">Descrição:</label>
      <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição do Produto"></textarea>
    </div>
    <div class="form-group">
      <label for="data_fabricacao">Data Fabricação:</label>
      <input type="date" class="form-control" id="data_fabricacao" name="data_fabricacao" >
    </div>
    <div class="form-group">
      <label for="data_vencimento">Data de Vencimento:</label>
      <input type="date" class="form-control" id="data_vencimento" name="data_vencimento" >
    </div>
    <div class="form-group">
      <label for="categoria">Categoria do Produto:</label>
      <input type="number" class="form-control" id="categoria" name="categoria" placeholder="Categoria do Produto">
    </div>
    <div class="form-group">
      <label for="disponivel">Disponivel?</label>
      <select name="disponivel" id="disponivel" class="form-control">
        <option value="0">Não</option>
        <option value="1">Sim</option>
      </select>
    </div>    


    <input type="submit" class="btn btn-primary" value="Criar Produto">
  </form>
  
</div>



@endsection