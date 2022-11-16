<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agropecuaria San Martin</title>
    <link rel="stylesheet" href="{{ asset('css/Bienvenida.css') }}">
</head>

<body>
    <header>
        @auth
        <nav class="au">
            @include('layouts.Cabecera')
            <p class="user">Has iniciado sesion como <strong>{{ auth()->user()->user_name }}</strong></p>
            <button class="close"><a class="a" href="/logout">Cerrar Sesion</a></button>
        </nav>
        @endauth
        @guest

        <nav class="au">
            @include('layouts.Cabecera')
        </nav>
        <nav class="algo">
            <ul>
                <h3>
                    <li class="title">Debes Iniciar Sesion o Registrarte</li>
                </h3>
                <a href="/login"><button class="btn-login">
                        <li><strong>Iniciar Sesion</li>
                    </button></a>
                <a href="/register"><button class="btn-register">
                        <li><strong>Registrarse</li>
                    </button></a>
            </ul>
        </nav>
        @endguest
    </header>
    @auth
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">
                <a href="/productos">
                    <li>Productos</li>
                </a>
                <a href="/categorias">
                    <li>Categorias</li>
                </a>
                <a href="{{route('facturation.create')}}">
                    <li>Factura</li>
                </a>
            </ul>
        </section>

    </aside>
    @endauth

    <main>
        <div class="separator">
            <!-- Text -->
            <div class="separator__content">
                <section class="aboutus">
                    <h2 class="titulos_2">¿Que Ofrecemos?</h2>
                </section>
            </div>

            <!-- Separator line -->
            <div class="separator__separator"></div>
        </div>

    </main>

    <section class="items">
        <div class="item">
            <img src="{{ asset('/storage/asadon.jpg')}}">
            <h4>Asadon</h4>
        </div>
        <div class="item">
            <img src="{{ asset('/storage/alambre puas.jpg')}}">
            <h4>Alambre de Pua</h4>
        </div>
        <div class="item">
            <img src="{{ asset('/storage/hierbicida.jpg')}}">
            <h4>Hierbicida</h4>
        </div>
        <div class="item">
            <img src=" {{ asset('/storage/pala.jpg')}}">
            <h4>Pala</h4>
        </div>
        <div class="item">
            <img src="{{ asset('storage/pecuarias.jpg')}}">
            <h4>Pecuarias</h4>
        </div>
        <div class="item">
            <img src="{{ asset('storage/piocha.jpg')}}">
            <h4>Piocha</h4>
        </div>
        <div class="item">
            <img src="{{ asset('storage/rastrillo.jpg')}}">
            <h4>Rastrillo</h4>
        </div>
        <div class="item">
            <img src="{{ asset('storage/serpentina.jpg')}}">
            <h4>Serpentina</h4>
        </div>
        <div class="item">
            <img src="{{ asset('storage/fumigadora.jpg')}}">
            <h4>Fumigadora</h4>
        </div>
    </section>

    </section>


    <!--pie de pagina-->
    <footer>
        <center>
            <h1>Contactanos:
                8333-7717 8544-5319 7719-8060

            </h1>

            <h3>Derechos Reservados &copy;2022</h3> <br>
        </center>

    </footer>

</body>

</html>
