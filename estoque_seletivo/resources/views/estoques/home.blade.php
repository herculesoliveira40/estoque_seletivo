@extends('layouts.main')
@section('title', 'Home Estoque')
@section('content')

<h1>Home Estoque</h1>
<p>foreach($produtos as $e)
      
<select  name="produto_id" id="produto_id"  class="form-control" placeholder="produto_id">  
        


        </select>
endforeach</p> 


<a href="/estoques/create" class="btn btn-success">Criar Estoque</a>
@endsection