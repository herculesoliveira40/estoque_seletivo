@extends('layouts.main')
@section('title', $produto->nome)

@section('content')
<div class="col-md-10 offset-md-1">
    <div class="card mb-3">
    <img class="img-preview w-50" src="/img/produtos/{{ $produto->imagem }}">
    <div class="card-body">
        <h5 class="card-title">{{$produto->nome}}</h5>
        <p class="card-text"><small class="text-muted">{{$produto->modelo}}</small></p>
        <p class="card-text">{{$produto->descricao}}</p>
        <a href="#" class="btn btn-primary">Go somewhere</a> <hr>
        <p>Criado por {{$produto->fabricante}}</p>

    </div>
    </div>
    
</div>



@endsection