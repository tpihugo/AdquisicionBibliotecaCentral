<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Biblioteca Central</a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Libros</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('libros.create') }}">Captura libro</a></li>
                            <li><a class="dropdown-item" href="{{ route('libros.index') }}">Consultar libros</a></li>
                        </ul>
                    </li>



                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Mobiliario</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('#') }}">Consulta Mobiliarios</a></li>
                        </ul>
                    </li>



                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Equipos y Préstamos</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('#') }}">Crear Préstamo </a></li>
                            <li><a class="dropdown-item" href="{{ route('#') }}">Consultar libros</a></li>
                        </ul>
                    </li>



            </ul>
        </div>
    </div>
</nav>
