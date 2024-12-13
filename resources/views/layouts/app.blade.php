<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Almacen | INBAL</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    <!-- CSS only -->
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

</head>

<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm ">
        <a class="navbar-brand" href="{{ url('/home') }}"  >
            <img  src="{{asset(url('img/logo-inbal.png'))}}" alt="" width="400px">
        </a>
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <strong>
                    <ul class="navbar-nav col-md-12 ">
                        <a class="nav-link text-dark" href="{{url('/home')}}">Panel</a>
                        <a class="nav-link text-dark" href="{{url('/dashboard')}}" align="center">Centros de Trabajo</a>
                        <a class="nav-link text-dark" href="{{url('/categoria')}}" align="center">Categorías </a>
                        <a class="nav-link text-dark" href="{{url('/producto')}}" align="center">Productos</a>
                        <a class="nav-link text-dark" href="{{route('inicioProveedores')}}">Proveedores</a>
                        <a class="nav-link text-dark" href="{{url('/inicioArticulos')}}">Inventario</a>  
                        <a class="nav-link text-dark" href="{{url('/facturacion')}}">Facturación</a>  
                    </ul>
                </strong>


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <!-- <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a> -->
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Registro') }}</a>
                            </li>
                        @endif
                    @else




                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <strong><i class="fa fa-user-o fa-2x" aria-hidden="true"></i>&nbsp;{{ Auth::user()->name }}</strong> <span class="caret"></span>
                            </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Panel de inicio') }}
                                    </a>
                                    <!-- <a class="dropdown-item" href="{{ route('perfil') }}">
                                        {{ __('Mi perfil') }}
                                    </a> -->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

<!--
    
    <footer class="page-footer font-small mdb-color pt-4" style="background:#45526E">

        
        <div class="container text-center text-md-left">

        
        <div class="row text-center text-md-left mt-3 pb-3">

            
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">¿Que hacemos?</h6>
            <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                consectetur
                adipisicing elit.</p>
            </div>
            

            <hr class="w-100 clearfix d-md-none">

          
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Producto</h6>
            <p>
                <a href="{{url('/')}}">MiInventarioOnline</a>
            </p>
            
            </div>
           

            <hr class="w-100 clearfix d-md-none">

            
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Links</h6>
            <p>
                <a href="{{url('/nosotros')}}">Nosotros</a>
            </p>
            <p>
                <a href="{{url('/blog')}}">Blog informativo</a>
            </p>
            <p>
                <a href="{{url('/login')}}">Inicio de sesion</a>
            </p>
            <p>
                <a href="{{url('/producto')}}">Producto</a>
            </p>
            </div>

            
            <hr class="w-100 clearfix d-md-none">

            
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contactenos</h6>
            <p> Lima, 15024, PE</p>
            <p> info@gmail.com</p>
            <p> + 01 234 567 88</p>
            </div>
           

        </div>
      
        <hr>

    
        <div class="row d-flex align-items-center">

         
            <div class="col-md-7 col-lg-8">

        
            <p class="text-center text-md-left">© 2020 Copyright:
                <a href="{{url('/')}}">
                <strong> MiInventarioOnline.com</strong>
                </a>
            </p>

            </div>
     
            <div class="col-md-5 col-lg-4 ml-lg-0">



        </div>
  
        </div>
        

    </footer>
  
    
-->



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


</body>


</html>
