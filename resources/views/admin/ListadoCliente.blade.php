<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CASA DE EMPEÑOS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('dist/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/estilos.css') }}" rel="stylesheet">
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        tr th {
            text-align: center;
        }

        .searchSep {
            display: flex;
            justify-content: space-between;

            width: 100%;
        }
    </style>

</head>

<body class="antialiased ">
    <div
        class="sinborde relative items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))

            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">HOME</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <!-- encabezado -->
        <div class="size">
            <div class="navbar1 flex size">
                <div class="max-w-6xl mx-auto mr-2">
                    <img class="icono" src="{{ asset('img/logo.png') }}">
                </div>
                <div class="mx-auto ml-2 titulo  texto-grande size"> CASA DE EMPEÑOS <br> ASOCIACION NUEVA MUTUA S.A. DE
                    C.V.</a></div>

            </div>

            @include('layout.nav')

            <br>
            <br>
            <div class="row g-3 mx-auto items-center justify-center needs-validation size100">
                <label for="validationCustom03" class="form-label  text-center h3 fw-bold">
                    LISTADO DE CLIENTES</label>
            </div>

            <div class="mt-8 size95 mx-auto items-center justify-center flex negritas">
                <div class="max-w-6xl size  flex items-center justify-center ">

                    <div class="table-responsive">
                        <div class="searchSep mt-3">
                            <div>
                                <form action="{{ route('listado_cliente') }}" method="GET">
                                    <div class="col-md-12 d-flex  mt-2 ">
                                        <input class="col-md-4 form-control text-center  me-2" type="search"
                                            placeholder="ingrese folio o número del cliente" name="search"
                                            aria-label="Search" value="{{ request('search') }}">
                                        <button class="btn bbtn mt-5 btn-primary my-2 my-sm-0"
                                            type="submit">Buscar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-sm table-striped mt-4">
                            <thead class="letra-blanca bg-dark">
                                <tr>
                                    <th scope="col">Folio</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Identificación</th>
                                    <th scope="col">Celular</th>
                                    <th scope="col">Domicilio</th>
                                    <th scope="col">EDITAR</th>
                                </tr>
                            </thead>

                            @foreach ($clientes as $cliente)
                                <tr>
                                    <th scope="row">{{ $cliente->id_cliente }}</th>
                                    <td>{{ $cliente->nombre_cliente . ' ' . $cliente->apellido_cliente }}</td>
                                    <td>
                                        {{ $cliente->tipo_de_identificacion }}
                                    </td>
                                    <td>{{ $cliente->telefono_cliente }} </td>
                                    <td>{{ 'C.' . $cliente->calle_cliente . ', N°' . $cliente->numero_cliente . ', ' . $cliente->colonia_cliente . ', ' . $cliente->ciudad_cliente }}
                                    </td>
                                    <td>
                                        <a class="nav-link" href="{{ route('cliente.edit', [$cliente->id_cliente]) }}"
                                            id="navbarDarkDropdownMenuLink" aria-expanded="false"><button
                                                class="ntn btn-primary btn1 "><i class="fas fa-edit"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        <div class="d-flex  justify-content-end">
                            {!! $clientes->links() !!}
                        </div>

                    </div>

                </div>
</body>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('dist/js/bootstrap.js') }}"></script>
@if (session('registro') == 'RegistroCliente')
    <script>
        Swal.fire(
            'SE REGISTRO CON EXITO!',
            'VALIDAR INFORMACIÓN EN LA SIGUIENTE TABLA!!',
            'success')
    </script>
@endif

@if (session('updateCliente') == 'Se actualizo')
    <script>
        /* Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'SE ACTUALIZO LA INFORMACIÓN!',
                        showConfirmButton: false,
                        timer: 1500
                    }) */
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'SE ACTUALIZO LA INFORMACIÓN!'
        })
    </script>
@endif

</html>
