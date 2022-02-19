<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/img/deadpool-logo.png" sizes="42x42" type="image/png">
    <title>@yield('title')</title>
                    <!-- CSS Interno -->
    <!-- <link rel="stylesheet" href="/css/styles.css"> -->
                    <!-- Boostrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
                    <!-- Icones IONIC -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body class="antialiased">

<nav class="navbar navbar-light bg-dark justify-content-between">
              
    <a class="nav-link" href="/">
    <img src="/img/deadpool-logo.png" alt="" height="60px" width="120px" class="d-inline-block align-text-top">
        Home
    </a>
    
        <a class="nav-link" aria-current="page" href="/produtos/create">Criar Produtos</a>
        <a class="nav-link" aria-current="page" href="/contact">Contato</a>
        <a class="nav-link" aria-current="page" href="/about">Sobre</a>
        <a class="nav-link" aria-current="page" href="/dashboard">Dashboard</a>
        @auth
              <li class="nav-item">
                <a href="/dashboard" class="nav-link">Meus eventos</a>
              </li>
              <li class="nav-item">
                <form action="/logout" method="POST">
                  @csrf
                  <a href="/logout" 
                        class="nav-link btn btn-outline-danger" 
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                    Sair
                  </a>
                </form>
              </li>
        @endauth
        @guest
              <li class="nav-item">
                <a href="/login" class="nav-link btn-warning">Entrar</a>
              </li>
              <li class="nav-item">
                <a href="/register" class="nav-link">Cadastrar</a>
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