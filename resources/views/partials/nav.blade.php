<header class="space-inter">
    <div class="container container-flex space-between">
        <figure class="logo"><img src="img/logo.png" alt=""></figure>
        <nav class="custom-wrapper" id="menu">

            <div class="pure-menu"></div>
            <ul class="container-flex list-unstyled">
                <li><a href="{{ route('inicio') }}" class="text-uppercase {{setActiveUrl('inicio')}}">Inicio</a></li>
                <li><a href="{{ route('inicio.nosotros') }}" class="text-uppercase {{setActiveUrl('inicio.nosotros')}}">Nosotros</a></li>
                <li><a href="{{ route('inicio.archivos') }}" class="text-uppercase {{setActiveUrl('inicio.archivos')}}">Archivos</a></li>
                <li><a href="{{ route('inicio.contactos') }}" class="text-uppercase {{setActiveUrl('inicio.contactos')}}">Contactos</a></li>
            </ul>
        </nav>
    </div>

</header>
