<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agropecuaria San Martin</title>
</head>
<body>
        <header>
            @auth
            <p>Has iniciado sesion como <strong>{{auth()->user()->user_name}}</strong></p>
            <a href="/logout">Cerrar Sesion</a>
            @endauth
           @guest
               <p>Debes Iniciar Sesion o Registrarte</p>
               <a href="/login"><button class="btn-login">Iniciar Sesion</button></a>
               <a href="/register"><button class="btn-register">Registrarse</button></a>
           @endguest
        </header>
        @auth
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li><a href="/articulo">Productos</a></li>
                    <li><a href="/articulo">Categorias</a></li>
                    <li><a href="/articulo">Clientes</a></li>
                    <li><a href="/Factura">Factura</a></li>
                </ul>
            </section>
            <a href="/logout"><button>Cerrar Sesion</button></a>
        </aside>
        @endauth

        <main>
            <section class="aboutus">
                <h2 class="titulos_2">¿Quienes somos?</h2>
            </section>
            @auth
                <section class="info">
                    <h2 class="titulos_2">Servicios Que ofrecemos</h2>
                </section>
            @endauth
        </main>
</body>
</html>
