@extends('layouts.main')
@section('title', 'Sobre')

@section('content')

<h1>Sobre</h1>
<h3>  Projeto Estoque, desenvolvido por Hercules Oliveira, colocando em pratica conhecimentos apreendidos.
</h3>

<h2>
     <hr> Utilizando PHP, Laravel, Javascript, MySQL, Bootstrap, jQuery, biblioteca DomPDF, autenticação para controle de acesso jetstream:Livewire.
</h2> 

<h2>  Com MVC CRUD OO podendo:  </h2>

<p>
     <hr> PRODUTOS: adicionar , editar(cria historioco do estoque), deletar, buscar por nome. 
     <hr> CATEGORIAS: adicionar , editar, deletar.   
     <hr> ESTOQUES: editar, status do estoques.
     <hr> HISTORICO: Visualizar todas as movimentações de estoques,
      e gerar Relatorio em PDF com: Produtos, quantidades movimentadas, Status, Datas, e Funcionarios Responsaveis. <hr> 
     
</p> 


@endsection