<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
    <link href="{{ asset('bootstrap-5.3.3/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-5.3.3/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css') }}" rel="stylesheet">
<!--     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->
    <script src="{{ asset('jquery-3.7.1/jquery.js') }}"></script>
    <style>
       body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
            margin-top: 56px; /* Altura del navbar */
        }
        footer {
            background-color: #f8f9fa;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{url('proyectos')}}">Proyectos</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{url('proyectos')}}">Inicio</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
 

    <main class="container">
        @yield('content')
    </main>

    <footer class="mt-auto text-center">
        <div class="container">
            <span class="text-muted">© 2024 Mi Aplicación. Todos los derechos reservados.</span>
        </div>
    </footer>


    <script src="{{ asset('bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>