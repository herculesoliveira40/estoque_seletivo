<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/img/deadpool-logo.png" sizes="42x42" type="image/png">
    <title>@yield('title')</title>
                    <!-- CSS Interno -->
    <link rel="stylesheet" href="/css/bootstrap.min.css"> 
                    <!-- Boostrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
                    <!-- Icones Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
                    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
</head>

<body class="antialiased">

<nav class="navbar navbar-light bg-dark justify-content-between">
              
    <a class="nav-link" href="/">
    <img src="/img/deadpool-logo.png" alt="" height="60px" width="120px" class="d-inline-block align-text-top">
        Home
    </a>
    
        
        <a class="nav-link" aria-current="page" href="/contato">Contato</a>
        <a class="nav-link" aria-current="page" href="/sobre">Sobre</a>
        <a class="nav-link" aria-current="page" href="/produtos">Produtos</a>
        @auth
              <li class="nav-item">
                <a class="nav-link btn btn-outline-danger" aria-current="page" href="/categorias/painel">Painel Categorias</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-danger" aria-current="page" href="/produtos/painel">Painel Produtos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-danger" aria-current="page" href="/estoques/painel">Painel Estoques</a>
              </li>
              <li class="nav-item">
                <a href="/dashboard" class="nav-link btn btn-outline-danger">Meu Cadastro</a>
              </li>
              <li class="nav-item">
                <form action="/logout" method="POST">
                  @csrf
                  <a href="/logout" 
                        class="nav-link btn btn-outline-danger" 
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                    Sair <i class="bi bi-door-open-fill"></i>
                  </a>
                </form>
              </li>
        @endauth
        @guest
              <li class="nav-item">
                <a href="/login" class="nav-link btn-warning">Entrar</a>
              </li>
              <li class="nav-item">
                <a href="/register" class="nav-link btn-warning">Cadastrar</a>
              </li>
        @endguest  

            
</nav>
<main>
    <div class="container-fluid">
        <div class="row">
            @if(session('mensagem'))
                <p class="alert alert-success">{{ session('mensagem') }}</p>
            @endif
            @yield('content')
        </div>
    </div>
</main>
<footer class="text-center bg-danger text-light">
    <p> "Como sabemos se queremos alguma coisa ou se foi nossa criação programou para querer" </p>
        <p>  2022 <a href="https://github.com/herculesoliveira40" target="_blank"> Shelby  &copy;</a> </strong> </p>
</footer>
</body>

</html>