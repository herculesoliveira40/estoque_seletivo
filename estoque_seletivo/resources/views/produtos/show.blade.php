@extends('layouts.main')
@section('title', $produto->nome)

@section('content')
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <img class="img-preview w-75" src="/img/produtos/{{ $produto->imagem }}">
      </div>
    </div>
  </div>



  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Produto: {{$produto->nome}}</h3> <hr> 
        <h5 class="card-title">Fabricado por: {{$produto->fabricante}}</h5>
        <p class="card-text">Modelo: {{$produto->modelo}}</p>
        <p class="card-text">Cor: {{$produto->modelo}}</p>
        <p class="card-text">Sku: {{$produto->modelo}}</p>
        <p class="card-text">Quantidade Disponivel: {{$produto->quantidade}}</p>
        <p class="card-text"><small class="text-muted">Fabricado em: {{$produto->data_fabricacao->format('m / Y')}}</small></p>
        <h4 class="card-text">Valor: {{$produto->valor}} R$</h4> <hr>   
            @auth
                <a href="/produtos/edit/{{ $produto->id }}" class="btn btn-info edit-btn"><i class="bi bi-wrench-adjustable-circle"></i> Editar</a>
            @endauth
      </div>
    </div>
  </div>
    <div class="card w-100">
      <div class="card-body">
        <h3 class="card-text"> Descrição: </h3>
        <p class="card-text"> {{$produto->descricao}}</p>
      
      </div>
    </div>
</div>



@endsection