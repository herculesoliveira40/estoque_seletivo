@extends('layouts.main')

@section('title', 'Home')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque por produto </h1>
    <form class="d-flex" action="/" method="GET">
        <input type="search" id="search" name="search" class="form-control me-2" placeholder="Procurar...">
        <button class="btn btn-outline-warning" name ="" type="submit">Buscar</button>
    </form>
</div>
<div id="produtos-container" class="col-md-12">
    @if($search)
        <h2>Buscando por Produtos de: <i>{{ $search }}</i></h2>
    @else
        <h2>Produtos</h2>
        <p class="subtitle">Produtos</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($produtos as $produto)
        <div class="card col-md-3">
            <img src="/img/produtos/{{$produto->imagem}}" alt="{{ $produto->nome }}">
            <div class="card-body">
                <p class="card-date">{{ date('d/m/Y', strtotime($produto->data_fabricacao)) }}</p>
                <h5 class="card-title">{{ $produto->nome }}</h5>
                <a href="/produtos/{{$produto->id}}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach
        @if(count($produtos) == 0)
            <p><strong> Sem produtos patrão :( </strong></p>
        @endif
    </div>
</div>

@endsection